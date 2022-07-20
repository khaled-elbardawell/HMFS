class Reservation {
  late int id;
  late int userId;
  late int doctorId;
  late int organizationId;
  late String reservationDate;
  late String reservationTime;
  late String createdAt;
  late String updatedAt;
  late int status;
  late Doctor doctor;
  late Doctor user;
  late Organization organization;

  Reservation({
    required this.id,
    required this.userId,
    required this.doctorId,
    required this.organizationId,
    required this.reservationDate,
    required this.reservationTime,
    required this.createdAt,
    required this.updatedAt,
    required this.status,
    required this.doctor,
    required this.user,
    required this.organization,
  });

  Reservation.fromJson(Map<String, dynamic> json) {
    id = json['id'];
    userId = json['user_id'];
    doctorId = json['doctor_id'];
    organizationId = json['organization_id'];
    reservationDate = json['reservation_date'];
    reservationTime = json['reservation_time'];
    createdAt = json['created_at'];
    updatedAt = json['updated_at'];
    status = json['status'];
    doctor = Doctor.fromJson(json['doctor']);
    user = Doctor.fromJson(json['user']);
    organization = Organization.fromJson(json['organization']);
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = <String, dynamic>{};
    data['id'] = id;
    data['user_id'] = userId;
    data['doctor_id'] = doctorId;
    data['organization_id'] = organizationId;
    data['reservation_date'] = reservationDate;
    data['reservation_time'] = reservationTime;
    data['created_at'] = createdAt;
    data['updated_at'] = updatedAt;
    data['status'] = status;

    data['doctor'] = doctor.toJson();

    data['user'] = user.toJson();

    data['organization'] = organization.toJson();

    return data;
  }
}

class Doctor {
  late int id;
  late String name;
  late String email;

  Doctor({required this.id, required this.name, required this.email});

  Doctor.fromJson(Map<String, dynamic> json) {
    id = json['id'];
    name = json['name'];
    email = json['email'];
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = <String, dynamic>{};
    data['id'] = id;
    data['name'] = name;
    data['email'] = email;
    return data;
  }
}

class ReservationUser {
  late int id;
  late String name;
  late String email;

  ReservationUser({required this.id, required this.name, required this.email});

  ReservationUser.fromJson(Map<String, dynamic> json) {
    id = json['id'];
    name = json['name'];
    email = json['email'];
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = <String, dynamic>{};
    data['id'] = id;
    data['name'] = name;
    data['email'] = email;
    return data;
  }
}

class Organization {
  late int id;
  late String name;

  Organization({required this.id, required this.name});

  Organization.fromJson(Map<String, dynamic> json) {
    id = json['id'];
    name = json['name'];
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = <String, dynamic>{};
    data['id'] = id;
    data['name'] = name;
    return data;
  }
}
