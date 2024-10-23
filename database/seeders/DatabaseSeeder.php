<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Client;
use App\Models\Delivery;
use App\Models\Employee;
use App\Models\Fine;
use App\Models\FineCode;
use App\Models\LegalPerson;
use App\Models\OkvedCode;
use App\Models\Operation;
use App\Models\Password;
use App\Models\Payment;
use App\Models\PaymentDatum;
use App\Models\PhysicalPerson;
use App\Models\Reservation;
use App\Models\Section;
use App\Models\Transport;
use App\Models\TypesOfWarehouseDistrict;
use App\Models\Warehouse;
use App\Models\WarehouseDistrict;
use App\Models\WarehouseZone;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Создаем коды штрафов
        FineCode::create(['description' => 'Штраф за нарушение 1']);
        FineCode::create(['description' => 'Штраф за нарушение 2']);

        // Создаем пароли
        Password::create(['password' => bcrypt('password1')]);
        Password::create(['password' => bcrypt('password2')]);

        // Создаем физических лиц
        $physicalPerson1 = PhysicalPerson::create([
            'surname' => 'Иванов',
            'name' => 'Иван',
            'patronymic' => 'Иванович',
            'birth_date' => '1980-01-01',
            'passport_series' => '1234',
            'passport_number' => '567890',
            'inn' => '123456789012',
            'snils' => '123-456-789 00',
            'phone' => '79001234567',
            'email' => 'ivanov@example.com'
        ]);

        $physicalPerson2 = PhysicalPerson::create([
            'surname' => 'Петров',
            'name' => 'Петр',
            'patronymic' => 'Петрович',
            'birth_date' => '1985-01-01',
            'passport_series' => '2345',
            'passport_number' => '678901',
            'inn' => '234567890123',
            'snils' => '234-567-890 01',
            'phone' => '79002345678',
            'email' => 'petrov@example.com'
        ]);

        // Создаем клиентов
        Client::create([
            'person_id' => $physicalPerson1->id,
            'type' => 'физическое лицо',
            'login' => 'ivanov',
            'password_reference' => 1 // Привязываем к первому паролю
        ]);

        Client::create([
            'person_id' => $physicalPerson2->id,
            'type' => 'физическое лицо',
            'login' => 'petrov',
            'password_reference' => 2 // Привязываем ко второму паролю
        ]);
        OkvedCode::create(['code' => '01.11.1']);
        OkvedCode::create(['code' => '01.11.2']);
        // Создаем юридических лиц
        $legalPerson = LegalPerson::create([
            'client_full_name' => 'ООО Ромашка',
            'client_short_name' => 'Ромашка',
            'inn' => '1234567890',
            'kpp' => '123456789',
            'ogrn' => '1234567890123',
            'physical_persons_id' => $physicalPerson1->id, // Привязываем к физическому лицу
            'phone' => '79003456789',
            'email' => 'info@romashka.ru',
            'address' => 'г. Москва, ул. Ленина, д. 1',
            'status' => 'активен',
            'okved_code_id' => 1 // Предположим, что у вас уже есть код ОКВЭД с ID 1
        ]);

        // Создаем коды ОКВЭД


        // Создаем штрафы
        Fine::create([
            'client_id' => 1, // Привязываем к первому клиенту
            'fine_description' => 'Штраф за превышение скорости',
            'fine_code_id' => 1 // Привязываем к первому коду штрафа
        ]);

        // Создаем данные для оплаты
        PaymentDatum::create([
            'client_id' => 1,
            'payment_score' => '40702810400000012345'
        ]);

        // Создаем города
        City::create(['name' => 'Москва']);
        City::create(['name' => 'Санкт-Петербург']);

        // Создаем типы складских районов
        TypesOfWarehouseDistrict::create(['name' => 'Торговый']);
        TypesOfWarehouseDistrict::create(['name' => 'Промышленный']);

        // Создаем сотрудников
        $employee = Employee::create([
            'surname' => 'Сидоров',
            'name' => 'Сидор',
            'patronymic' => 'Сидорович',
            'birth_date' => '1990-01-01',
            'passport_series' => '3456',
            'passport_number' => '789012',
            'inn' => '345678901234',
            'snils' => '345-678-901 02',
            'phone' => '79004567890',
            'email' => 'sidorov@example.com'
        ]);

        // Создаем транспорт
        Transport::create([
            'type' => 'Грузовик',
            'employee_id' => $employee->id,
            'availability' => true
        ]);

        // Создаем доставку
        Delivery::create([
            'transport_id' => 1, // Привязываем к первому транспорту
            'start_delivery_date' => '2024-01-01',
            'end_delivery_date' => '2024-01-02',
            'status' => false
        ]);

        // Создаем оплату
        Payment::create(['status' => false]);

        // Создаем районы складов
        WarehouseDistrict::create([
            'district_number' => 1,
            'address' => 'г. Москва, ул. Складская, д. 1',
            'warehouse_type_id' => 1, // Предположим, что у вас есть тип склада с ID 1
            'city_id' => 1 // Привязываем к первому городу
        ]);

        // Создаем зоны складов
        $zone = WarehouseZone::create([
            'warehouse_district_id' => 1, // Привязываем к первому району
            'zone_number' => 1
        ]);

        // Создаем склады
        Warehouse::create([
            'zone_id' => $zone->id,
            'warehouse_number' => 1
        ]);

        // Создаем секции
        Section::create([
            'warehouse_id' => 1, // Привязываем к первому складу
            'section_number' => 1,
            'status' => true
        ]);

        // Создаем резервации
        Reservation::create([
            'district_id' => 1,
            'zone_id' => $zone->id,
            'warehouse_id' => 1,
            'section_id' => 1,
            'start_date_of_reservation' => '2024-01-01',
            'end_date_of_reservation' => '2024-01-05'
        ]);

        // Создаем операции
        Operation::create([
            'reservation_id' => 1,
            'delivery_id' => 1,
            'payment_id' => 1,
            'client_id' => 1
        ]);
    }
}
