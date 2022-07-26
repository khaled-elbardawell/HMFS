import 'package:dio/dio.dart';
import 'package:flutter/material.dart';
import 'package:geolocator/geolocator.dart';
import 'package:get/get_core/get_core.dart';
import 'package:get/get_navigation/get_navigation.dart';
import 'package:hmfs/app/core/utils/key.dart';
import 'package:hmfs/app/data/models/placedetails.dart';
import 'package:hmfs/app/data/services/storage/services.dart';

class LocationServices {
  static Future<Position> getCurrentLocation() async {
    bool isServiceEnable = await Geolocator.isLocationServiceEnabled();
    LocationPermission permission;
    if (!isServiceEnable) {
      await Geolocator.requestPermission();
    }
    permission = await Geolocator.checkPermission();
    if (permission == LocationPermission.denied) {
      permission = await Geolocator.requestPermission();
      if (permission == LocationPermission.deniedForever) {
        return Future.error(
            'Location permissions are permanently denied, we cannot request permissions.');
      }
      if (permission == LocationPermission.denied) {
        return Future.error('Location permissions are denied');
      }
    }

    return await Geolocator.getCurrentPosition(
        desiredAccuracy: LocationAccuracy.high);
    // return position;
  }

  late Dio dio;

  LocationServices() {
    BaseOptions options = BaseOptions(
      baseUrl: mapBaseUrl,
      receiveDataWhenStatusError: true,
    );
    dio = Dio(options);
  }

  Future<List<dynamic>> getPlacesSuggestions(
      String place, String sessionToken) async {
    try {
      Response response = await dio.get(
        '/api/place/autocomplete/json',
        queryParameters: {
          "input": place,
          "key": mapAPIKey,
          "type": "address",
          "sessiontoken": sessionToken,
        },
      );
      return response.data["predictions"];
    } on DioError catch (e) {
      Get.snackbar(
        'Error',
        'Something is wrong ${e.message}',
        backgroundColor: Colors.white,
        colorText: Colors.black,
      );
      return [];
    }
  }

  Future<PlacesDetails?> getPlacesDetails(
      String placeId, String sessionToken) async {
    PlacesDetails? placesDetails;
    try {
      Response response = await dio.get(
        'api/place/details/json',
        queryParameters: {
          "place_id": placeId,
          "fields": "geometry",
          "key": mapAPIKey,
          "sessiontoken": sessionToken,
        },
      );
      placesDetails = PlacesDetails.fromJson(response.data);
    } on DioError catch (e) {
      Get.snackbar(
        'Error',
        'Something is wrong ${e.message}',
        backgroundColor: Colors.white,
        colorText: Colors.black,
      );
    }
    return placesDetails;
  }
}
