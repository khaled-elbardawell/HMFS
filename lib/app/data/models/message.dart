class Chat {
  final String message;
  final DateTime sendDate;
  final int senderId;
  final int receiveId;

  Chat({
    required this.message,
    required this.receiveId,
    required this.sendDate,
    required this.senderId,
  });
}
