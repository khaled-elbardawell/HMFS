import 'package:hmfs/app/data/models/placesuggestion.dart';
import 'package:hmfs/app/data/models/placedetails.dart';
import 'package:hmfs/app/data/services/location/services.dart';

class LocationProvider {
  final LocationServices _webServices = LocationServices();

  Future<List<PlaceSuggestion>> getPlacesSuggestions(
      String place, String sessionToken) async {
    final locations =
        await _webServices.getPlacesSuggestions(place, sessionToken);
    return locations.map((e) => PlaceSuggestion.fromJson(e)).toList();
  }

  Future<PlacesDetails?> getPlacesDetails(
      String placeId, String sessionToken) async {
    final placesDetails =
        await _webServices.getPlacesDetails(placeId, sessionToken);
    return placesDetails;
  }
}
