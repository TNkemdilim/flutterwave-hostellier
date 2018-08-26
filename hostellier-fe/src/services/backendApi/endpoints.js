const enpointVersion = "api/v1";

// Authentication
export const loginStudent = `${enpointVersion}/auth/student/login`;
export const registerStudent = `${enpointVersion}/auth/student/register`;

// Rooms
export const allCampusRooms = `${enpointVersion}/rooms`;
export const allOffCampusRooms = `${enpointVersion}/rooms/off-campus`;
export const allOnCampusRooms = `${enpointVersion}/rooms/on-campus`;

// Booking (On-Campus)
export const getOnCampusBooking = `${enpointVersion}/booking/off-campus`;
export const createOnCampusBooking = `${enpointVersion}/booking/on-campus`;

// Booking (Off-Campus)
export const getOffCampusBooking = `${enpointVersion}/booking/on-campus`;
export const createOffCampusBooking = `${enpointVersion}/booking/off-campus`;

// Student
export const studentProfile = `${enpointVersion}/me`;
export const studentBookings = `${enpointVersion}/me/booking`;
export const studentOffCampusBooking = `${enpointVersion}/me/booking/off-campus`;
export const studentOnCampusBooking = `${enpointVersion}/me/booking/on-campus`;
