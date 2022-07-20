class Doctor {
  late int id;
  late String name;
  late String email;
  late String phone;
  late String bio;
  late dynamic file;

  Doctor({
    required this.id,
    required this.name,
    required this.email,
    required this.phone,
    required this.bio,
    required this.file,
  });

  Doctor.fromJson(Map<String, dynamic> json) {
    id = json['id'];
    name = json['name'];
    email = json['email'];
    phone = json['phone'];
    bio = json['bio'] ?? '';
    file = json['file'];
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = <String, dynamic>{};
    data['id'] = id;
    data['name'] = name;
    data['email'] = email;
    data['phone'] = phone;
    data['bio'] = bio;
    data['file'] = file;
    return data;
  }
}
