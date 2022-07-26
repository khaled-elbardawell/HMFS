class PlacesDetails {
  late List<dynamic> htmlAttributions;
  late Result result;
  late String status;

  PlacesDetails({
    required this.htmlAttributions,
    required this.result,
    required this.status,
  });

  PlacesDetails.fromJson(Map<String, dynamic> json) {
    json['html_attributions'].forEach((v) {
      htmlAttributions.add(v);
    });
    result = Result.fromJson(json['result']);
    status = json['status'];
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = <String, dynamic>{};
    data['html_attributions'] =
        htmlAttributions.map((v) => v.toJson()).toList();
    data['result'] = result.toJson();
    data['status'] = status;
    return data;
  }
}

class Result {
  late Geometry geometry;

  Result({required this.geometry});

  Result.fromJson(Map<String, dynamic> json) {
    geometry = Geometry.fromJson(json['geometry']);
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = <String, dynamic>{};
    data['geometry'] = geometry.toJson();

    return data;
  }
}

class Geometry {
  late Location location;
  late Viewport viewport;

  Geometry({required this.location, required this.viewport});

  Geometry.fromJson(Map<String, dynamic> json) {
    location = Location.fromJson(json['location']);
    viewport = Viewport.fromJson(json['viewport']);
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = <String, dynamic>{};

    data['location'] = location.toJson();

    data['viewport'] = viewport.toJson();

    return data;
  }
}

class Location {
  late double lat;
  late double lng;

  Location({required this.lat, required this.lng});

  Location.fromJson(Map<String, dynamic> json) {
    lat = json['lat'];
    lng = json['lng'];
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = <String, dynamic>{};
    data['lat'] = lat;
    data['lng'] = lng;
    return data;
  }
}

class Viewport {
  late Location northeast;
  late Location southwest;

  Viewport({required this.northeast, required this.southwest});

  Viewport.fromJson(Map<String, dynamic> json) {
    northeast = Location.fromJson(json['northeast']);
    southwest = Location.fromJson(json['southwest']);
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = <String, dynamic>{};

    data['northeast'] = northeast.toJson();

    data['southwest'] = southwest.toJson();

    return data;
  }
}
