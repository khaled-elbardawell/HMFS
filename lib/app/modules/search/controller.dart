import 'dart:async';

import 'package:geolocator/geolocator.dart';
import 'package:get/get.dart';
import 'package:google_maps_flutter/google_maps_flutter.dart';
import 'package:hmfs/app/data/models/placedetails.dart';
import 'package:hmfs/app/data/models/placesuggestion.dart';
import 'package:uuid/uuid.dart';

import '../../data/services/location/repository.dart';

class SearchController extends GetxController {
  static Position? position;
  RxBool requesting = false.obs;
  RxBool requestingDetails = false.obs;
  RxList<PlaceSuggestion> places = <PlaceSuggestion>[].obs;
  final LocationRepository locationRepository;
  Completer<GoogleMapController> mapController = Completer();

  late PlacesDetails placeDetails;

  // this variables for getPlaceDetails

  RxSet<Marker> markers = <Marker>{}.obs;

  late Marker searchPlaceMarker;
  late Marker currentPlaceMarker;
  late CameraPosition goToSearchForPlace;

  SearchController({required this.locationRepository});

  void getPlacesSuggestions(String place) {
    final sessionToken = const Uuid().v4();
    locationRepository.getPlacesSuggestions(place, sessionToken).then((value) {
      places.value = value;
      requesting.value = true;
    });
  }

  void getPlaceDetails(String placeId) {
    final sessionToken = const Uuid().v4();
    locationRepository.getPlacesDetails(placeId, sessionToken).then(
      (value) {
        placeDetails = value!;
        requestingDetails.value = true;
      },
    );
  }

  void buildCameraNewPosition() {
    goToSearchForPlace = CameraPosition(
      target: LatLng(
        placeDetails.result.geometry.location.lat,
        placeDetails.result.geometry.location.lng,
      ),
      bearing: 0.0,
      tilt: 0.0,
      zoom: 17.0,
    );
  }

  Future<void> goToMySearchForLocation(PlaceSuggestion placeSuggestion) async {
    buildCameraNewPosition();
    final GoogleMapController controller = await mapController.future;
    controller.animateCamera(
      CameraUpdate.newCameraPosition(goToSearchForPlace),
    );
    buildSearchedPlaceMarker(placeSuggestion);
  }

  void buildSearchedPlaceMarker(PlaceSuggestion placeSuggestion) {
    searchPlaceMarker = Marker(
      markerId: const MarkerId('2'),
      position: goToSearchForPlace.target,
      onTap: () {
        buildCurrentLocationMarker();
      },
      infoWindow: InfoWindow(
        title: "${placeSuggestion.description}\n",
      ),
      icon: BitmapDescriptor.defaultMarkerWithHue(BitmapDescriptor.hueRed),
    );
    addMarkerToMarkers(searchPlaceMarker);
  }

  void buildCurrentLocationMarker() {
    currentPlaceMarker = Marker(
      markerId: const MarkerId('1'),
      position: LatLng(
        position!.latitude,
        position!.longitude,
      ),
      infoWindow: const InfoWindow(
        title: "Your Current Location",
      ),
      icon: BitmapDescriptor.defaultMarkerWithHue(BitmapDescriptor.hueBlue),
    );
    addMarkerToMarkers(currentPlaceMarker);
  }

  void addMarkerToMarkers(Marker marker) {
    markers.add(marker);
  }
}
