import React, { useEffect, useState } from 'react';
import AttendanceService from '../services/AttendanceService';

function AttendanceList() {
  const [attendanceData, setAttendanceData] = useState([]);

  useEffect(() => {
    const data = AttendanceService.getAttendanceData();
    setAttendanceData(data);
  }, []);

  return (
    <div>
      <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>Check In</th>
            <th>Check Out</th>
            <th>Total Working Hours</th>
          </tr>
        </thead>
        <tbody>
          {attendanceData.map((record, index) => (
            <tr key={index}>
              <td>{record.name}</td>
              <td>{record.checkin || 'N/A'}</td>
              <td>{record.checkout || 'N/A'}</td>
              <td>
                {record.checkin && record.checkout
                  ? calculateWorkingHours(record.checkin, record.checkout)
                  : 'N/A'}
              </td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
}

export default AttendanceList;
