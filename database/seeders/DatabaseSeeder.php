<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
          // Xóa dữ liệu cũ của specialists và users (nếu cần)
        DB::table('users')->truncate();
        DB::table('specialists')->truncate();
        DB::table('hospitals')->truncate();
        DB::table('services')->truncate();
        DB::table('clinics')->truncate();

        // Thêm dữ liệu vào bảng specialists
        DB::table('specialists')->insert([
            ['spname' => 'Nội khoa'],
            ['spname' => 'Ngoại khoa'],
            ['spname' => 'Nhi khoa'],
            ['spname' => 'Da liễu'],
            ['spname' => 'Tim mạch'],
        ]);
        DB::table('hospitals')->insert([
            'hospitalname' => 'Bệnh viện Trung ương',
            'address' => '123 Đường Chính, Hà Nội',
        ]);
         DB::table('services')->insert([
            [
                'servicename' => 'Khám Nội khoa',
                'detail' => 'Khám tổng quát các bệnh lý nội khoa.',
                'price' => 200000,
                'image' => 'noikhoa.jpg',
                'time' => '00:30:00',
            ],
            [
                'servicename' => 'Khám Ngoại khoa',
                'detail' => 'Khám và điều trị các bệnh ngoại khoa.',
                'price' => 250000,
                'image' => 'ngoikhoa.jpg',
                'time' => '00:45:00',
            ],
            [
                'servicename' => 'Khám Nhi khoa',
                'detail' => 'Khám bệnh cho trẻ em và sơ sinh.',
                'price' => 180000,
                'image' => 'nhikhoa.jpg',
                'time' => '00:30:00',
            ],
            [
                'servicename' => 'Khám Da liễu',
                'detail' => 'Khám và điều trị các bệnh về da.',
                'price' => 220000,
                'image' => 'dailieu.jpg',
                'time' => '00:30:00',
            ],
            [
                'servicename' => 'Khám Tim mạch',
                'detail' => 'Khám và theo dõi các bệnh tim mạch.',
                'price' => 300000,
                'image' => 'timmach.jpg',
                'time' => '00:40:00',
            ],
        ]);
        // Lấy id_specialist để gán cho bác sĩ (ví dụ lấy id_specialist = 1)
        $specialistId = DB::table('specialists')->where('spname', 'Nội khoa')->value('id_specialist');

        // Thêm dữ liệu vào bảng users
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'phonenumber' => '0900000001',
            'password' => Hash::make('123123'),
            'id_role' => 1,
        ]);

        User::create([
            'name' => 'Khách Hàng',
            'email' => 'customer@example.com',
            'phonenumber' => '0900000002',
            'password' => Hash::make('123123'),
            'id_role' => 2,
        ]);

        User::create([
            'name' => 'Bác Sĩ',
            'email' => 'doctor@example.com',
            'phonenumber' => '0900000003',
            'price' => 60000,
            'password' => Hash::make('123123'),
            'id_role' => 3,
            'id_specialist' => $specialistId,
        ]);

        User::create([
            'name' => 'Nhân Viên',
            'email' => 'staff@example.com',
            'phonenumber' => '0900000004',
            'password' => Hash::make('123123'),
            'id_role' => 4,
        ]);
        //seed phong
        // Lấy id của bệnh viện, dịch vụ và người dùng để sử dụng trong clinics
        $idHospital = DB::table('hospitals')->where('hospitalname', 'Bệnh viện Trung ương')->value('id_hospital');
        $idService = DB::table('services')->where('servicename', 'Khám Nội khoa')->value('id_service');
        $idUser = DB::table('users')->where('email', 'doctor@example.com')->value('id_user');

        // Thêm dữ liệu vào bảng clinics
        DB::table('clinics')->insert([
            'clinicname' => 'Phòng khám Nội tổng quát',
            'id_hospital' => $idHospital,
            'id_service' => $idService,
            'id_user' => $idUser,
        ]);

        // Lấy id_user của khách hàng (customer)
        $idCustomer = DB::table('users')->where('email', 'customer@example.com')->value('id_user');

        // Thêm dữ liệu vào bảng patientrecords (3 bệnh nhân)
        DB::table('patientrecords')->insert([
            [
                'prname' => 'Nguyễn Văn A',
                'birthday' => '1990-01-15',
                'phonenumber' => '0901111111',
                'gender' => 'Nam',
                'address' => '123 Nguyễn Trãi, Hà Nội',
                'id_user' => $idCustomer,
            ],
            [
                'prname' => 'Trần Thị B',
                'birthday' => '1985-05-22',
                'phonenumber' => '0902222222',
                'gender' => 'Nữ',
                'address' => '456 Lê Lợi, Đà Nẵng',
                'id_user' => $idCustomer,
            ],
            [
                'prname' => 'Phạm Văn C',
                'birthday' => '2000-12-01',
                'phonenumber' => '0903333333',
                'gender' => 'Nam',
                'address' => '789 Trần Hưng Đạo, TP.HCM',
                'id_user' => $idCustomer,
            ],
        ]);

        // Seed dữ liệu bảng medicines
        DB::table('medicines')->insert([
            [
                'medicinename' => 'Paracetamol',
                'detail' => 'Thuốc giảm đau, hạ sốt thông thường.',
                'ingredient' => 'Paracetamol 500mg',
            ],
            [
                'medicinename' => 'Amoxicillin',
                'detail' => 'Kháng sinh phổ rộng điều trị nhiễm khuẩn.',
                'ingredient' => 'Amoxicillin 500mg',
            ],
            [
                'medicinename' => 'Ibuprofen',
                'detail' => 'Giảm đau, kháng viêm không steroid.',
                'ingredient' => 'Ibuprofen 400mg',
            ],
            [
                'medicinename' => 'Loperamide',
                'detail' => 'Điều trị tiêu chảy cấp và mãn tính.',
                'ingredient' => 'Loperamide HCl 2mg',
            ],
            [
                'medicinename' => 'Ciprofloxacin',
                'detail' => 'Kháng sinh điều trị nhiễm trùng tiết niệu, hô hấp.',
                'ingredient' => 'Ciprofloxacin 500mg',
            ],
            [
                'medicinename' => 'Vitamin C',
                'detail' => 'Bổ sung vitamin C, tăng sức đề kháng.',
                'ingredient' => 'Ascorbic acid 500mg',
            ],
            [
                'medicinename' => 'Cetirizine',
                'detail' => 'Điều trị dị ứng, ngứa, viêm mũi.',
                'ingredient' => 'Cetirizine 10mg',
            ],
            [
                'medicinename' => 'Metformin',
                'detail' => 'Hạ đường huyết cho người tiểu đường tuýp 2.',
                'ingredient' => 'Metformin 500mg',
            ],
            [
                'medicinename' => 'Omeprazole',
                'detail' => 'Giảm tiết axit dạ dày, điều trị viêm loét.',
                'ingredient' => 'Omeprazole 20mg',
            ],
            [
                'medicinename' => 'Diazepam',
                'detail' => 'An thần, hỗ trợ điều trị mất ngủ, lo âu.',
                'ingredient' => 'Diazepam 5mg',
            ],
        ]);
            // Lấy id của một clinic (ví dụ lấy phòng khám vừa seed trước đó)
        $idClinic = DB::table('clinics')->where('clinicname', 'Phòng khám Nội tổng quát')->value('id_clinic');

        // Tạo lịch khám từ 8h đến 17h, mỗi ca 2 giờ trong 3 ngày
        $dates = ['2025-09-25', '2025-09-26', '2025-09-27'];
        $startHour = 8;
        $endHour = 17;
        $interval = 2;

        $appointments = [];

        foreach ($dates as $date) {
            for ($hour = $startHour; $hour < $endHour; $hour += $interval) {
                $startTime = sprintf('%02d:00:00', $hour);
                $finishTime = sprintf('%02d:00:00', $hour + $interval);
                $appointments[] = [
                    'day' => $date,
                    'time' => $startTime,
                    'finishtime' => $finishTime,
                    'id_clinic' => $idClinic,
                ];
            }
        }

        // Thêm vào bảng appointments
        DB::table('appointments')->insert($appointments);

    }
}
