class HealthProfile {
  late int id;
  late String title;
  late String description;
  late String recommendations;
  late String requests;
  late int doctorId;
  late String createdAt;
  late HealthProfileDoctor doctor;
  late List<dynamic> uploads;

  HealthProfile({
    required this.id,
    required this.title,
    required this.description,
    required this.recommendations,
    required this.requests,
    required this.doctorId,
    required this.createdAt,
    required this.doctor,
    required this.uploads,
  });

  HealthProfile.fromJson(Map<String, dynamic> json) {
    id = json['id'];
    title = json['title'];
    description = json['description'];
    recommendations = json['recommendations'];
    requests = json['requests'];
    doctorId = json['doctor_id'];
    createdAt = json['created_at'];
    doctor = HealthProfileDoctor.fromJson(json['doctor']);
    if (json['uploads'] != null) {
      uploads = <Uploads>[];
      json['uploads'].forEach((v) {
        uploads.add(Uploads.fromJson(v));
      });
    }
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = <String, dynamic>{};
    data['id'] = id;
    data['title'] = title;
    data['description'] = description;
    data['recommendations'] = recommendations;
    data['requests'] = requests;
    data['doctor_id'] = doctorId;
    data['created_at'] = createdAt;
    data['doctor'] = doctor.toJson();
    data['uploads'] = uploads.map((v) => v.toJson()).toList();

    return data;
  }
}

class HealthProfileDoctor {
  late int id;
  late String name;
  late String email;
  late dynamic upload;

  HealthProfileDoctor({
    required this.id,
    required this.name,
    required this.email,
    required this.upload,
  });

  HealthProfileDoctor.fromJson(Map<String, dynamic> json) {
    id = json['id'];
    name = json['name'];
    email = json['email'];
    if (json['upload'] != null) {
      upload = Uploads.fromJson(json['upload']);
    }
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = <String, dynamic>{};
    data['id'] = id;
    data['name'] = name;
    data['email'] = email;
    data['upload'] = upload;
    return data;
  }
}

class Uploads {
  late int id;
  late String file;
  late String uploadableType;
  late int uploadableId;

  Uploads({
    required this.id,
    required this.file,
    required this.uploadableType,
    required this.uploadableId,
  });

  Uploads.fromJson(Map<String, dynamic> json) {
    id = json['id'];
    file = json['file'];
    uploadableType = json['uploadable_type'];
    uploadableId = json['uploadable_id'];
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = <String, dynamic>{};
    data['id'] = id;
    data['file'] = file;
    data['uploadable_type'] = uploadableType;
    data['uploadable_id'] = uploadableId;
    return data;
  }
}
