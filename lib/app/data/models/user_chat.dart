class UserChats {
  late int chatId;
  late dynamic label;
  late dynamic lastMessage;
  late String updatedAt;
  late int userId;
  late String name;
  late dynamic file;

  UserChats({
    required this.chatId,
    required this.label,
    required this.lastMessage,
    required this.updatedAt,
    required this.userId,
    required this.name,
    required this.file,
  });

  UserChats.fromJson(Map<String, dynamic> json) {
    chatId = json['chat_id'];
    label = json['label'];
    lastMessage = json['last_message'];
    updatedAt = json['updated_at'];
    userId = json['user_id'];
    name = json['name'];
    file = json['file'];
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = <String, dynamic>{};
    data['chat_id'] = chatId;
    data['label'] = label;
    data['last_message'] = lastMessage;
    data['updated_at'] = updatedAt;
    data['user_id'] = userId;
    data['name'] = name;
    data['file'] = file;
    return data;
  }
}
