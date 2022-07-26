import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:hmfs/app/core/utils/extensions.dart';
import 'package:hmfs/app/core/values/colors.dart';
import 'package:hmfs/app/data/models/placesuggestion.dart';
import 'package:hmfs/app/modules/search/controller.dart';
import 'package:hmfs/app/modules/search/widget/placeitem.dart';
import 'package:material_floating_search_bar/material_floating_search_bar.dart';

class BuildFloatingSearchBar extends StatelessWidget {
  final FloatingSearchBarController searchBarController;
  final SearchController searchCtrl;
  late PlaceSuggestion placeSuggestion;
  List<PlaceSuggestion> places = [];
  BuildFloatingSearchBar(
      {Key? key, required this.searchBarController, required this.searchCtrl})
      : super(key: key);

  @override
  Widget build(BuildContext context) {
    final isPortrait =
        MediaQuery.of(context).orientation == Orientation.portrait;
    return FloatingSearchBar(
      controller: searchBarController,
      elevation: 7,
      hintStyle: TextStyle(
        fontSize: 18,
        color: HexColor.fromHex(lightBlue),
      ),
      queryStyle: const TextStyle(
        fontSize: 18,
      ),
      hint: "Find a Place",
      border: const BorderSide(style: BorderStyle.none),
      margins: const EdgeInsets.fromLTRB(20, 30, 20, 0),
      padding: const EdgeInsets.fromLTRB(7, 0, 2, 0),
      height: 52,
      iconColor: HexColor.fromHex(blue),
      scrollPadding: const EdgeInsets.only(top: 16, bottom: 56),
      transitionDuration: const Duration(milliseconds: 600),
      transitionCurve: Curves.easeInOut,
      physics: const BouncingScrollPhysics(),
      axisAlignment: isPortrait ? 0.0 : -1.0,
      openAxisAlignment: 0.0,
      width: isPortrait ? 600 : 500,
      debounceDelay: const Duration(milliseconds: 500),
      onQueryChanged: (query) {
        searchCtrl.getPlacesSuggestions(query);
      },
      onFocusChanged: (_) {},
      transition: CircularFloatingSearchBarTransition(),
      actions: [
        FloatingSearchBarAction(
          showIfOpened: false,
          child: CircularButton(
            icon: Icon(
              Icons.place_outlined,
              color: HexColor.fromHex(lightBlue),
            ),
            onPressed: () {},
          ),
        ),
      ],
      builder: (context, transition) {
        return ClipRRect(
          borderRadius: BorderRadius.circular(8),
          child: Column(
            mainAxisAlignment: MainAxisAlignment.start,
            mainAxisSize: MainAxisSize.min,
            children: [
              Obx(
                () => buildPlaces(),
              ),
              Obx(
                () => buildSelectedPlaceLocation(),
              ),
            ],
          ),
        );
      },
    );
  }

  Widget buildPlaces() {
    if (searchCtrl.requesting.value) {
      places = searchCtrl.places;
      if (places.isNotEmpty) {
        return Obx(() => buildPlacesList());
      } else {
        return Container();
      }
    } else {
      return Container();
    }
  }

  Widget buildPlacesList() {
    return ListView.builder(
      physics: const ClampingScrollPhysics(),
      shrinkWrap: true,
      itemCount: places.length,
      itemBuilder: (context, index) {
        return InkWell(
          onTap: () async {
            print('pla : ' + places[index].description);
            placeSuggestion = places[index];
            searchBarController.close();
            searchCtrl.getPlaceDetails(placeSuggestion.placeId);
          },
          child: PlaceItem(place: places[index]),
        );
      },
    );
  }

  Widget buildSelectedPlaceLocation() {
    if (searchCtrl.requestingDetails.value) {
      searchCtrl.goToMySearchForLocation(placeSuggestion);
    }
    return Container();
  }
}
