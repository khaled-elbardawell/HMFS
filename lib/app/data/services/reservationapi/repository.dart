import 'package:hmfs/app/data/models/reservation.dart';
import 'package:hmfs/app/data/providers/reservation/provider.dart';

class ReservationRepository {
  ReservationProvider reservationProvider;
  ReservationRepository({
    required this.reservationProvider,
  });

  Future<List<Reservation>> getUserUpcomingReservations(String token) async {
    return await reservationProvider.getUserUpcomingReservations(token);
  }

  Future<List<Reservation>> getUserPreviousReservations(String token) async =>
      await reservationProvider.getUserPreviousReservations(token);

  Future<Reservation?> getUserReservation(
          String token, int reservationId) async =>
      await reservationProvider.getUserReservation(token, reservationId);
}
