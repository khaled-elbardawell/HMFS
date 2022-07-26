import 'dart:async';

import 'package:flutter/material.dart';
import 'package:geolocator/geolocator.dart';
import 'package:get/get.dart';
import 'package:google_maps_flutter/google_maps_flutter.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/core/values/colors.dart';
import 'package:hmfs/app/data/models/placedetails.dart';
import 'package:hmfs/app/data/models/placesuggestion.dart';
import 'package:hmfs/app/data/providers/location/provider.dart';
import 'package:hmfs/app/data/services/location/repository.dart';
import 'package:hmfs/app/modules/search/controller.dart';
import 'package:hmfs/app/modules/search/widget/buildmap.dart';
import 'package:hmfs/app/modules/search/widget/floatingsearchbar.dart';
import 'package:material_floating_search_bar/material_floating_search_bar.dart';

import '../../data/services/location/services.dart';

class SearchScreen extends StatefulWidget {
  const SearchScreen({Key? key}) : super(key: key);

  @override
  State<SearchScreen> createState() => _SearchScreenState();
}

class _SearchScreenState extends State<SearchScreen> {
  FloatingSearchBarController searchBarController =
      FloatingSearchBarController();
  final searchCrtl = Get.put(
    SearchController(
      locationRepository: LocationRepository(
        locationProvider: LocationProvider(),
      ),
    ),
  );

  static final CameraPosition cameraPosition = CameraPosition(
    target: LatLng(SearchController.position!.latitude,
        SearchController.position!.longitude),
    bearing: 0.0,
    tilt: 0.0,
    zoom: 17.0,
  );

  Future<void> getCurrentLocation() async {
    await LocationServices.getCurrentLocation();
    SearchController.position =
        (await Geolocator.getLastKnownPosition().whenComplete(
      () {
        setState(() {});
      },
    ))!;
  }

  Future<void> goCurrentLocation() async {
    final GoogleMapController controller =
        await searchCrtl.mapController.future;
    controller.animateCamera(CameraUpdate.newCameraPosition(cameraPosition));
  }

  @override
  void initState() {
    getCurrentLocation();
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        centerTitle: true,
        backgroundColor: HexColor.fromHex(blue),
        elevation: 0.0,
        title: Text(
          'Search',
          style: TextStyle(
            fontSize: 18.0.sp,
            fontWeight: FontWeight.bold,
            color: HexColor.fromHex(white),
          ),
        ),
      ),
      body: Stack(
        fit: StackFit.expand,
        children: [
          SearchController.position != null
              ? BuildMap(
                  searchCtrl: searchCrtl,
                  cameraPosition: cameraPosition,
                  mapController: searchCrtl.mapController,
                )
              : Center(
                  child: CircularProgressIndicator(
                    color: HexColor.fromHex(blue),
                  ),
                ),
          BuildFloatingSearchBar(
              searchBarController: searchBarController, searchCtrl: searchCrtl),
        ],
      ),
      floatingActionButton: Container(
        margin: const EdgeInsets.fromLTRB(0, 0, 8, 30),
        child: FloatingActionButton(
          backgroundColor: HexColor.fromHex(blue),
          onPressed: () {
            goCurrentLocation();
          },
          child: Icon(
            Icons.place,
            color: HexColor.fromHex(white),
          ),
        ),
      ),
    );
  }
}
