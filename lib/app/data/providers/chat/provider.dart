import 'package:hmfs/app/data/models/message.dart';
import 'package:hmfs/app/data/models/user_chat.dart';
import 'package:hmfs/app/data/services/chat_services/services.dart';

class ChatProvider {
  final ChatWebServices _webServices = ChatWebServices();

  Future<List<UserChats>> getUserChats(String token) async {
    final userChats = await _webServices.getUserChats(token);
    return userChats.map((e) => UserChats.fromJson(e)).toList();
  }

  Future<ChatMessage?> getMessagesChat(String token, String chatId) async {
    final chatMessage = await _webServices.getMessagesChat(token, chatId);
    return chatMessage;
  }
}
