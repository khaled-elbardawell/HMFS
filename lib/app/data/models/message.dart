class Message {
  late bool status;
  late String msg;
  late int code;
  late Data data;

  Message({
    required this.status,
    required this.msg,
    required this.code,
    required this.data,
  });

  Message.fromJson(Map<String, dynamic> json) {
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
  late Receiver receiver;
  late List<Messages> messages;

  Data({required this.receiver, required this.messages});

  Data.fromJson(Map<String, dynamic> json) {
    receiver = Receiver.fromJson(json['receiver']);
    json['messages'].forEach((v) {
      messages.add(Messages.fromJson(v));
    });
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = <String, dynamic>{};
    data['receiver'] = receiver.toJson();
    data['messages'] = messages.map((v) => v.toJson()).toList();

    return data;
  }
}

class Receiver {
  late int id;
  late int userId;
  late int chatId;
  late User user;

  Receiver(
      {required this.id,
      required this.userId,
      required this.chatId,
      required this.user});

  Receiver.fromJson(Map<String, dynamic> json) {
    id = json['id'];
    userId = json['user_id'];
    chatId = json['chat_id'];
    user = User.fromJson(json['user']);
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = <String, dynamic>{};
    data['id'] = id;
    data['user_id'] = userId;
    data['chat_id'] = chatId;
    data['user'] = user.toJson();

    return data;
  }
}

class User {
  late int id;
  late String name;
  late String email;
  late Upload upload;

  User(
      {required this.id,
      required this.name,
      required this.email,
      required this.upload});

  User.fromJson(Map<String, dynamic> json) {
    id = json['id'];
    name = json['name'];
    email = json['email'];
    upload = Upload.fromJson(json['upload']);
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = <String, dynamic>{};
    data['id'] = id;
    data['name'] = name;
    data['email'] = email;
    data['upload'] = upload.toJson();

    return data;
  }
}

class Upload {
  late int id;
  late int uploadableId;
  late String uploadableType;
  late String file;

  Upload(
      {required this.id,
      required this.uploadableId,
      required this.uploadableType,
      required this.file});

  Upload.fromJson(Map<String, dynamic> json) {
    id = json['id'];
    uploadableId = json['uploadable_id'];
    uploadableType = json['uploadable_type'];
    file = json['file'];
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = <String, dynamic>{};
    data['id'] = id;
    data['uploadable_id'] = uploadableId;
    data['uploadable_type'] = uploadableType;
    data['file'] = file;
    return data;
  }
}

class Messages {
  late int id;
  late int senderId;
  late String message;
  late int chatId;
  late String createdAt;
  late List<Recipients> recipients;
  late User sender;

  Messages({
    required this.id,
    required this.senderId,
    required this.message,
    required this.chatId,
    required this.createdAt,
    required this.recipients,
    required this.sender,
  });

  Messages.fromJson(Map<String, dynamic> json) {
    id = json['id'];
    senderId = json['sender_id'];
    message = json['message'];
    chatId = json['chat_id'];
    createdAt = json['created_at'];
    json['recipients'].forEach((v) {
      recipients.add(Recipients.fromJson(v));
    });

    sender = User.fromJson(json['sender']);
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = <String, dynamic>{};
    data['id'] = id;
    data['sender_id'] = senderId;
    data['message'] = message;
    data['chat_id'] = chatId;
    data['created_at'] = createdAt;
    data['recipients'] = recipients.map((v) => v.toJson()).toList();
    data['sender'] = sender.toJson();

    return data;
  }
}

class Recipients {
  late int id;
  late dynamic seenAt;
  late int userId;
  late int messageId;
  late User user;

  Recipients({
    required this.id,
    required this.seenAt,
    required this.userId,
    required this.messageId,
    required this.user,
  });

  Recipients.fromJson(Map<String, dynamic> json) {
    id = json['id'];
    seenAt = json['seen_at'];
    userId = json['user_id'];
    messageId = json['message_id'];
    user = User.fromJson(json['user']);
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = <String, dynamic>{};
    data['id'] = id;
    data['seen_at'] = seenAt;
    data['user_id'] = userId;
    data['message_id'] = messageId;

    data['user'] = user.toJson();

    return data;
  }
}
