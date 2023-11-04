import AttendanceModel from '../models/AttendanceModel';

const AttendanceService = {
  getAttendanceData: () => {

    return [
      new AttendanceModel('Employee 1', '9:00 AM', '5:00 PM'),
      new AttendanceModel('Employee 2', '9:15 AM', '4:45 PM'),
    ];
  },
};

export default AttendanceService;