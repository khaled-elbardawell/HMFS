// ignore: file_names

class Message {
  final String message;
  final DateTime sendDate;
  final int senderId;
  final int reciverId;

  Message({
    required this.message,
    required this.reciverId,
    required this.sendDate,
    required this.senderId,
  });
}
