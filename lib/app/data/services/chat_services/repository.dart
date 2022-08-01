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

  Future<void> sendMessage(String token, String chatId, String message) async =>
      await chatProvider.sendMessage(token, chatId, message);

  Future<void> seenMessage(String token, String chatId) async =>
      await chatProvider.seenMessage(token, chatId);

  Future<dynamic> createChat(String token, String userId) async =>
      await chatProvider.createChat(token, userId);
}
