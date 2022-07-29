import 'package:hmfs/app/data/models/message.dart';
import 'package:hmfs/app/data/models/user_chat.dart';
import 'package:hmfs/app/data/providers/chat/provider.dart';

class ChatRepository {
  ChatProvider chatProvider;
  ChatRepository({
    required this.chatProvider,
  });

  Future<List<UserChats>> getUserChats(String token) async =>
      await chatProvider.getUserChats(token);

  Future<ChatMessage?> getMessagesChat(String token, String chatId) async =>
      await chatProvider.getMessagesChat(token, chatId);
}
