import 'package:hmfs/app/core/utils/key.dart';
import 'package:hmfs/app/data/services/storage/services.dart';

class User {
  late bool status;
  late String msg;
  late int code;
  late Data data;

  User(
      {required this.status,
      required this.msg,
      required this.code,
      required this.data});

  User.fromJson(Map<String, dynamic> json) {
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
  late TokenDetails tokenDetails;

  Data({
    required this.id,
    required this.name,
    required this.email,
    required this.bio,
    required this.phone,
    required this.emailVerifiedAt,
    required this.createdAt,
    required this.updatedAt,
    required this.tokenDetails,
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
    tokenDetails = TokenDetails.fromJson(json['token_details']);
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
    data['token_details'] = tokenDetails.toJson();

    return data;
  }
}

class TokenDetails {
  late String accessToken;
  late String tokenType;
  late int expiresIn;

  TokenDetails(
      {required this.accessToken,
      required this.tokenType,
      required this.expiresIn});

  TokenDetails.fromJson(Map<String, dynamic> json) {
    accessToken = json['access_token'] ?? CacheHelper.getTokenData(keyToken);
    tokenType = json['token_type'];
    expiresIn = json['expires_in'];
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = <String, dynamic>{};
    data['access_token'] = accessToken;
    data['token_type'] = tokenType;
    data['expires_in'] = expiresIn;
    return data;
  }
}
