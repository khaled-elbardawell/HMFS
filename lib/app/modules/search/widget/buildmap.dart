import 'dart:async';

import 'package:flutter/material.dart';
import 'package:get/state_manager.dart';
import 'package:google_maps_flutter/google_maps_flutter.dart';
import 'package:hmfs/app/modules/search/controller.dart';

class BuildMap extends StatelessWidget {
  final CameraPosition cameraPosition;
  final Completer<GoogleMapController> mapController;
  final SearchController searchCtrl;
  const BuildMap(
      {Key? key,
      required this.cameraPosition,
      required this.mapController,
      required this.searchCtrl})
      : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Obx(
      () => GoogleMap(
        markers: searchCtrl.markers.value,
        mapType: MapType.normal,
        myLocationEnabled: true,
        myLocationButtonEnabled: false,
        zoomControlsEnabled: false,
        initialCameraPosition: cameraPosition,
        onMapCreated: (GoogleMapController controller) {
          mapController.complete(controller);
        },
      ),
    );
  }
}
