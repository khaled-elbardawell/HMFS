class Chat {
  final String message;
  final DateTime sendDate;
  final int senderId;
  final int reciverId;

  Chat({
    required this.message,
    required this.reciverId,
    required this.sendDate,
    required this.senderId,
  });
}
