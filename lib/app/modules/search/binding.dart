import 'package:get/get.dart';
import 'package:hmfs/app/data/providers/location/provider.dart';
import 'package:hmfs/app/data/services/location/repository.dart';
import 'package:hmfs/app/modules/search/controller.dart';

class SearchBinding extends Bindings {
  @override
  void dependencies() {
    Get.lazyPut(
      () => SearchController(
        locationRepository: LocationRepository(
          locationProvider: LocationProvider(),
        ),
      ),
    );
  }
}
