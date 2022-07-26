import 'package:hmfs/app/data/models/placedetails.dart';
import 'package:hmfs/app/data/models/placesuggestion.dart';

import '../../providers/location/provider.dart';

class LocationRepository {
  LocationProvider locationProvider;
  LocationRepository({
    required this.locationProvider,
  });

  Future<List<PlaceSuggestion>> getPlacesSuggestions(
      String place, String sessionToken) async {
    return await locationProvider.getPlacesSuggestions(place, sessionToken);
  }

  Future<PlacesDetails?> getPlacesDetails(
          String placeId, String sessionToken) async =>
      await locationProvider.getPlacesDetails(placeId, sessionToken);
}
