import 'package:flutter/material.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'package:hmfs/app/core/utils/extensions.dart';

class ProfileCard extends StatelessWidget {
  const ProfileCard({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Container(
      padding: EdgeInsets.all(6.5.wp),
      decoration: const BoxDecoration(
        color: Colors.white,
      ),
      child: Column(
        children: [
          Row(
            mainAxisAlignment: MainAxisAlignment.end,
            children: [
              InkWell(
                onTap: () {},
                child: Container(
                  padding: EdgeInsets.all(2.0.wp),
                  decoration: BoxDecoration(
                    color: HexColor.fromHex('#6574CF').withOpacity(0.27),
                    border: Border.all(
                      color: HexColor.fromHex('#6574CF'),
                      width: 2,
                    ),
                    borderRadius: BorderRadius.circular(6),
                  ),
                  child: SvgPicture.asset(
                    'assets/images/Icon-chat.svg',
                    semanticsLabel: 'Location Icon',
                    width: 3.8.wp,
                    height: 3.8.hp,
                    color: HexColor.fromHex('#6574CF'),
                  ),
                ),
              ),
            ],
          ),
          Stack(
            alignment: AlignmentDirectional.bottomEnd,
            children: [
              ClipRRect(
                borderRadius: BorderRadius.circular(600.0),
                child: Image.asset(
                  "assets/images/doctor-avatar.jpg",
                  fit: BoxFit.fill,
                  width: 30.0.wp,
                  height: 30.0.wp,
                ),
              ),
              Positioned(
                right: 3.0.wp,
                bottom: 1.8.wp,
                child: SvgPicture.asset(
                  'assets/images/Icon-online.svg',
                  semanticsLabel: 'location Icon',
                  width: 2.2.wp,
                  height: 2.2.hp,
                ),
              ),
            ],
          ),
          SizedBox(
            height: 2.5.hp,
          ),
          Text(
            "Dr. Chikanso Chima",
            style: TextStyle(
              fontSize: 15.0.sp,
              color: HexColor.fromHex('#222B45'),
              fontWeight: FontWeight.bold,
            ),
          ),
          SizedBox(
            height: 0.9.hp,
          ),
          Text(
            "Ophthalmologist",
            style: TextStyle(
              fontSize: 11.5.sp,
              color: HexColor.fromHex('#8F9BB3'),
              fontWeight: FontWeight.w500,
            ),
          ),
          SizedBox(
            height: 3.5.hp,
          ),
          Row(
            mainAxisAlignment: MainAxisAlignment.center,
            crossAxisAlignment: CrossAxisAlignment.center,
            children: [
              SvgPicture.asset(
                'assets/images/Icon-star-blue.svg',
                semanticsLabel: 'star Icon',
                width: 3.5.wp,
                height: 3.5.hp,
              ),
              SizedBox(
                width: 1.0.wp,
              ),
              Text(
                "4.7",
                style: TextStyle(
                  fontSize: 15.5.sp,
                  color: HexColor.fromHex('#6574CF'),
                  fontWeight: FontWeight.bold,
                ),
              ),
              SizedBox(
                width: 4.0.wp,
              ),
              Text(
                "(12 reviews)",
                style: TextStyle(
                  fontSize: 9.9.sp,
                  color: HexColor.fromHex('#8F9BB3'),
                  fontWeight: FontWeight.w400,
                ),
              ),
            ],
          ),
          SizedBox(
            height: 4.7.hp,
          ),
          Row(
            mainAxisAlignment: MainAxisAlignment.center,
            crossAxisAlignment: CrossAxisAlignment.center,
            children: [
              Expanded(
                flex: 1,
                child: Column(
                  mainAxisAlignment: MainAxisAlignment.start,
                  crossAxisAlignment: CrossAxisAlignment.center,
                  children: [
                    Row(
                      mainAxisAlignment: MainAxisAlignment.center,
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children: [
                        SvgPicture.asset(
                          'assets/images/Icon-location.svg',
                          semanticsLabel: 'location Icon',
                          width: 3.2.wp,
                          height: 3.2.hp,
                        ),
                        SizedBox(
                          width: 2.5.wp,
                        ),
                        Column(
                          mainAxisAlignment: MainAxisAlignment.start,
                          crossAxisAlignment: CrossAxisAlignment.start,
                          children: [
                            Text(
                              "New York",
                              style: TextStyle(
                                fontSize: 15.5.sp,
                                color: HexColor.fromHex('#222B45'),
                                fontWeight: FontWeight.w500,
                              ),
                            ),
                            SizedBox(
                              height: 0.6.hp,
                            ),
                            Text(
                              "Location",
                              style: TextStyle(
                                fontSize: 12.0.sp,
                                color: HexColor.fromHex('#8F9BB3'),
                                fontWeight: FontWeight.w400,
                              ),
                            ),
                          ],
                        ),
                      ],
                    ),
                  ],
                ),
              ),
              Container(
                height: 10.9.hp,
                width: 2.0,
                color: HexColor.fromHex('#EDF1F7'),
              ),
              Expanded(
                flex: 1,
                child: Column(
                  mainAxisAlignment: MainAxisAlignment.start,
                  crossAxisAlignment: CrossAxisAlignment.center,
                  children: [
                    Row(
                      mainAxisAlignment: MainAxisAlignment.center,
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children: [
                        SvgPicture.asset(
                          'assets/images/Icon-pin.svg',
                          semanticsLabel: 'pin Icon',
                          width: 3.2.wp,
                          height: 3.2.hp,
                        ),
                        SizedBox(
                          width: 2.5.wp,
                        ),
                        Column(
                          mainAxisAlignment: MainAxisAlignment.start,
                          crossAxisAlignment: CrossAxisAlignment.start,
                          children: [
                            Text(
                              "20 Years",
                              style: TextStyle(
                                fontSize: 15.5.sp,
                                color: HexColor.fromHex('#222B45'),
                                fontWeight: FontWeight.w500,
                              ),
                            ),
                            SizedBox(
                              height: 0.6.hp,
                            ),
                            Text(
                              "Experience",
                              style: TextStyle(
                                fontSize: 12.0.sp,
                                color: HexColor.fromHex('#8F9BB3'),
                                fontWeight: FontWeight.w400,
                              ),
                            ),
                          ],
                        ),
                      ],
                    ),
                  ],
                ),
              ),
            ],
          ),
          Divider(
            color: HexColor.fromHex('#EDF1F7'),
            thickness: 2,
            indent: 4,
            endIndent: 4,
            height: 6,
          ),
          SizedBox(
            height: 3.0.hp,
          ),
          Container(
            width: 50.0.wp,
            decoration: BoxDecoration(
              color: HexColor.fromHex('#6574CF'),
              borderRadius: BorderRadius.circular(6),
            ),
            child: TextButton(
              onPressed: () {},
              child: Row(
                mainAxisAlignment: MainAxisAlignment.center,
                crossAxisAlignment: CrossAxisAlignment.center,
                children: [
                  SvgPicture.asset(
                    'assets/images/Icon-reservation-unactive.svg',
                    semanticsLabel: 'location Icon',
                    width: 3.5.wp,
                    height: 3.5.hp,
                    color: Colors.white,
                  ),
                  SizedBox(
                    width: 2.5.wp,
                  ),
                  Text(
                    "Reservation",
                    style: TextStyle(
                      fontSize: 15.0.sp,
                      color: HexColor.fromHex('#ffffff'),
                      fontWeight: FontWeight.w400,
                    ),
                  ),
                ],
              ),
            ),
          )
        ],
      ),
    );
  }
}
