import 'package:get/get.dart';
import 'package:get_storage/get_storage.dart';
import 'package:hmfs/app/core/utils/key.dart';

class StorageServices extends GetxService {
  late GetStorage _box;

  Future<StorageServices> init() async {
    _box = GetStorage();
    await _box.writeIfNull(key, []);
    return this;
  }

  T read<T>(String key) {
    return _box.read(key);
  }

  void write(String key, dynamic value) async {
    await _box.write(key, value);
  }
}
