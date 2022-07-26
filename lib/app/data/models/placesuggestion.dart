class PlaceSuggestion {
  late String placeId;
  late String description;

  PlaceSuggestion({
    required this.placeId,
    required this.description,
  });

  PlaceSuggestion.fromJson(Map<String, dynamic> json) {
    placeId = json['place_id'];
    description = json['description'];
  }
}
