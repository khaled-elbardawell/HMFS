class UserProfile {
  late bool status;
  late String msg;
  late int code;
  late Data data;

  UserProfile(
      {required this.status,
      required this.msg,
      required this.code,
      required this.data});

  UserProfile.fromJson(Map<String, dynamic> json) {
    status = json['status'];
    msg = json['msg'];
    code = json['code'];
    data = Data.fromJson(json['data']);
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = <String, dynamic>{};
    data['status'] = status;
    data['msg'] = msg;
    data['code'] = code;
    data['data'] = this.data.toJson();

    return data;
  }
}

class Data {
  late int id;
  late String name;
  late String email;
  late String bio;
  late String phone;
  late String emailVerifiedAt;
  late String createdAt;
  late String updatedAt;
  late dynamic upload;

  Data({
    required this.id,
    required this.name,
    required this.email,
    required this.bio,
    required this.phone,
    required this.emailVerifiedAt,
    required this.createdAt,
    required this.updatedAt,
    required this.upload,
  });

  Data.fromJson(Map<String, dynamic> json) {
    id = json['id'];
    name = json['name'];
    email = json['email'];
    bio = json['bio'] ?? '';
    phone = json['phone'] ?? '';
    emailVerifiedAt = json['email_verified_at'] ?? '';
    createdAt = json['created_at'];
    updatedAt = json['updated_at'];
    upload = Upload.fromJson(json['upload']);
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = <String, dynamic>{};
    data['id'] = id;
    data['name'] = name;
    data['email'] = email;
    data['bio'] = bio;
    data['phone'] = phone;
    data['email_verified_at'] = emailVerifiedAt;
    data['created_at'] = createdAt;
    data['updated_at'] = updatedAt;

    data['upload'] = upload.toJson();

    return data;
  }
}

class Upload {
  late int id;
  late String uploadableType;
  late int uploadableId;
  late String name;
  late String file;
  late String extensionFile;
  late String type;
  late String locale;
  late String createdAt;
  late String updatedAt;
  late String uploadPath;

  Upload({
    required this.id,
    required this.uploadableType,
    required this.uploadableId,
    required this.name,
    required this.file,
    required this.extensionFile,
    required this.type,
    required this.locale,
    required this.createdAt,
    required this.updatedAt,
    required this.uploadPath,
  });

  Upload.fromJson(Map<String, dynamic> json) {
    id = json['id'];
    uploadableType = json['uploadable_type'];
    uploadableId = json['uploadable_id'];
    name = json['name'];
    file = json['file'];
    extensionFile = json['extension'];
    type = json['type'];
    locale = json['locale'];
    createdAt = json['created_at'];
    updatedAt = json['updated_at'];
    uploadPath = json['upload_path'] ?? '';
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = <String, dynamic>{};
    data['id'] = id;
    data['uploadable_type'] = uploadableType;
    data['uploadable_id'] = uploadableId;
    data['name'] = name;
    data['file'] = file;
    data['extension'] = extensionFile;
    data['type'] = type;
    data['locale'] = locale;
    data['created_at'] = createdAt;
    data['updated_at'] = updatedAt;
    data['upload_path'] = uploadPath;
    return data;
  }
}
