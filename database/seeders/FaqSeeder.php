<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $faqs = [

            // =====================================================================
            // FLIGHT INFORMATION — English
            // =====================================================================
            [
                'question'   => 'What time does airline … depart?',
                'answer'     => "Hello, thank you for your question. Flight departure times depend on the airline you're considering. Please check their website or the airport information screen.\nWe hope this helps.",
                'keyword'    => 'departure, depart, flight time, airline schedule',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'What time does airline … land?',
                'answer'     => "Hello, thank you for your question. The flight arrival time depends on the airline you are flying with. Please check the airport for the latest information.\nThank you.",
                'keyword'    => 'arrival, land, landing, flight time, schedule',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Are there any delays for airline …?',
                'answer'     => "Hello, thank you for your question. Flight delay information depends on the airline's operating conditions. Please check our website or the airport for the latest information.\nWe hope this helps.",
                'keyword'    => 'delay, delayed, flight delay, late',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'What time does boarding start?',
                'answer'     => "Hello, thank you for your question. Boarding times are determined by each airline and can be found on your ticket or on our official website.",
                'keyword'    => 'boarding, boarding time, boarding start',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Where is my gate?',
                'answer'     => "Hello, thank you for your question. Garuda Indonesia is at Gate 1, while Citilink Indonesia, Batik Air, and Wings Air are at Gate 3 on the second floor of the departure terminal.\nWe hope this helps.",
                'keyword'    => 'gate, terminal gate, Garuda, Citilink, Batik Air, Wings Air',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Is my flight on time?',
                'answer'     => "Hello, thank you for your question. Flight statuses are subject to change. Please check the information screens or the airport website for the latest information.\nThank you.",
                'keyword'    => 'on time, flight status, flight schedule',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Where can I find the flight schedule?',
                'answer'     => "Hello, thank you for your question. Flight schedules can be found at the terminal entrance and in the second-floor departure lounge.\nWe hope this helps.",
                'keyword'    => 'flight schedule, schedule, departure lounge',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => "What is the weather for today's flights?",
                'answer'     => "Hello, thank you for your question. Flight weather information is subject to change. Please check with relevant official sources.\nThank you.",
                'keyword'    => 'weather, flight weather, forecast',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // =====================================================================
            // CHECK-IN AND BAGGAGE PROCEDURES — English
            // =====================================================================
            [
                'question'   => 'What are the check-in procedures?',
                'answer'     => "Hello, thank you for your question. To check-in, you'll need your flight ticket and ID.\nWe hope this helps.",
                'keyword'    => 'check-in, procedure, checkin, ticket, ID',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Where are the airline check-in counters located?',
                'answer'     => "Hello, thank you for your question. The check-in counter is located on the first floor of the departure terminal.\nThank you.",
                'keyword'    => 'check-in counter, counter location, first floor',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Can I still check-in now?',
                'answer'     => "Hello, thank you for your question. Check-in availability depends on time and airline policy.\nWe hope this helps.",
                'keyword'    => 'check-in, late check-in, still check-in',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'How many hours must I be at the airport before my flight?',
                'answer'     => "Hello, thank you for your question. It is recommended to arrive at least 1.5 hours before departure.\nThank you.",
                'keyword'    => 'hours before flight, arrival time, 1.5 hours, early arrival',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'What is the maximum weight of baggage?',
                'answer'     => "Hello, thank you for your question. The baggage allowance is 20 kg. Any excess will incur an additional fee.\nWe hope this helps.",
                'keyword'    => 'baggage weight, maximum baggage, 20 kg, excess baggage',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'What is the maximum weight of carry-on baggage?',
                'answer'     => "Hello, thank you for your question. The carry-on baggage limit is 7 kg.\nThank you.",
                'keyword'    => 'carry-on, cabin baggage, hand luggage, 7 kg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Where should I go if my baggage is lost?',
                'answer'     => "Hello, thank you for your question. Please report it to the lost and found section at the airport.\nWe hope this helps.",
                'keyword'    => 'lost baggage, missing baggage, lost and found',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Where should I report damaged baggage?',
                'answer'     => "Hello, thank you for your question. Damaged baggage can be reported to the lost and found department.\nThank you.",
                'keyword'    => 'damaged baggage, damaged luggage, baggage report',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // =====================================================================
            // AIRPORT FACILITIES — English
            // =====================================================================
            [
                'question'   => 'Is there a smoking area?',
                'answer'     => "Hello, thank you for your question. The smoking area is available on the second floor of the departure terminal.\nWe hope this helps.",
                'keyword'    => 'smoking area, smoking, smoke',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Where is the charging station?',
                'answer'     => "Hello, thank you for your question. Charging stations are available in various areas of the airport.\nThank you.",
                'keyword'    => 'charging station, charger, power outlet, charging',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Where is the toilet?',
                'answer'     => "Hello, thank you for your question. Toilets are available in the departure, arrival, and parking areas.\nWe hope this helps.",
                'keyword'    => 'toilet, restroom, bathroom, WC',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Where is the prayer room?',
                'answer'     => "Hello, thank you for your question. The prayer room is on the second floor of the departure terminal, and the mosque is in the parking area.\nThank you.",
                'keyword'    => 'prayer room, mosque, mushola, salat, religion',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Where is the ATM?',
                'answer'     => "Hello, thank you for your question. The ATM is located outside the departure terminal near the restrooms.\nWe hope this helps.",
                'keyword'    => 'ATM, cash machine, money, bank',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Is there a money changer?',
                'answer'     => "Hello, thank you for your question. There are currently no money changers available inside the airport.\nThank you.",
                'keyword'    => 'money changer, currency exchange, foreign exchange',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Where is the clinic or medical center?',
                'answer'     => "Hello, thank you for your question. The clinic is on the first floor of the departure terminal.\nWe hope this helps.",
                'keyword'    => 'clinic, medical center, health, doctor, first aid',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Where is the nursery room / mother & child room?',
                'answer'     => "Hello, thank you for your question. The nursery room / mother & child room is available at the departure and arrival terminals.\nThank you.",
                'keyword'    => 'nursery room, baby room, mother child, breastfeeding',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // =====================================================================
            // PASSENGER ASSISTANCE AND ACCESSIBILITY — English
            // =====================================================================
            [
                'question'   => 'Are disability services available?',
                'answer'     => "Hello, thank you for your question. The airport provides special services for passengers with disabilities to ensure a comfortable stay. Please contact staff if you need assistance.\nThank you.",
                'keyword'    => 'disability, disabled, special services, accessibility',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Are there any special procedures for people with disabilities?',
                'answer'     => "Hello, thank you for your question. Special procedures and services are available for people with disabilities to ensure a comfortable departure and arrival process.\nWe hope this helps.",
                'keyword'    => 'disability procedures, special assistance, disabled passengers',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Where can I ask for wheelchair assistance?',
                'answer'     => "Hello, thank you for your question. You can request wheelchair assistance through your airline or directly from airport staff in the departure area. We are ready to assist you.\nThank you.",
                'keyword'    => 'wheelchair, wheelchair assistance, disability, mobility',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'I lost my wallet, where should I go?',
                'answer'     => "Hello, thank you for your question. If you lose your wallet, please proceed immediately to the airport information counter for further assistance. We hope your belongings are found soon.\nThank you.",
                'keyword'    => 'lost wallet, missing wallet, lost item, information counter',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Where is the information desk?',
                'answer'     => "Hello, thank you for your question. The information desk is located on the first floor of the departure terminal and is ready to assist you with any information needs. Please come directly to that location.\nThank you.",
                'keyword'    => 'information desk, info counter, help desk, customer service',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // =====================================================================
            // TICKETING AND AIRLINE SERVICES — English
            // =====================================================================
            [
                'question'   => 'If you want to buy an airline ticket, in which section?',
                'answer'     => "Hello, thank you for your question. You can purchase airline tickets at the ticketing counter located on the first floor of the departure terminal.\nWe hope this helps.",
                'keyword'    => 'buy ticket, purchase ticket, ticketing counter, airline ticket',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'I missed my flight, what should I do?',
                'answer'     => "Hello, thank you for your question. If you miss your flight, you can purchase a ticket for a later flight or contact the airline to find out what options are available.\nWe hope you find the best solution.",
                'keyword'    => 'missed flight, miss flight, late for flight, next flight',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Where can I reschedule my ticket?',
                'answer'     => "Hello, thank you for your question. Ticket rescheduling can be done at the airline counter or through the online app where you purchased your ticket.\nWe hope this helps.",
                'keyword'    => 'reschedule, rebook, change ticket, ticket change',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Where to get a ticket refund?',
                'answer'     => "Hello, thank you for your question. Refund requests can be made at the airline counter or through the online application used when purchasing the ticket. Please follow the applicable procedures.\nThank you.",
                'keyword'    => 'refund, ticket refund, cancel ticket, money back',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // =====================================================================
            // TRANSPORTATION AND PICK-UP SERVICES — English
            // =====================================================================
            [
                'question'   => 'Where is the pick-up location?',
                'answer'     => "Hello, thank you for your question. The passenger pick-up area is located in the arrivals terminal. Please proceed to that area.\nThank you.",
                'keyword'    => 'pick-up, pickup, arrivals, passenger pick-up',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Is it permissible to order an online motorbike taxi to the airport?',
                'answer'     => "Hello, thank you for your question. Currently, online motorcycle taxis are not permitted to enter the airport for pick-up.\nThank you for your understanding.",
                'keyword'    => 'ojek online, motorcycle taxi, online taxi, gojek, grab',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Where is the airport taxi?',
                'answer'     => "Hello, thank you for your question. Airport taxis are available outside the arrivals terminal and can be used directly by passengers.\nWe hope this helps.",
                'keyword'    => 'taxi, airport taxi, cab, transport',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'How much is the airport taxi fare?',
                'answer'     => "Hello, thank you for your question. Airport taxi fares depend on the distance to your destination. For more information, please inquire directly at the airport taxi counter.\nWe hope this helps.",
                'keyword'    => 'taxi fare, taxi price, taxi cost, transport cost',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Is transportation to Batu available?',
                'answer'     => "Hello, thank you for your question. Transportation to Batu is available, and airport taxis are available.\nWe wish you a smooth journey.",
                'keyword'    => 'Batu, transportation to Batu, travel to Batu',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // =====================================================================
            // LOST AND FOUND — English
            // =====================================================================
            [
                'question'   => 'Where is the lost and found?',
                'answer'     => "Hello, thank you for your question. The lost and found service is located inside the arrivals terminal. Please go directly to that location.\nThank you.",
                'keyword'    => 'lost and found, lost item, found item, missing',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'I left my stuff on the plane, what should I do?',
                'answer'     => "Hello, thank you for your question. If you left an item on the plane, please immediately contact the airport information officer through official channels such as Instagram, email, or the call center.\nWe hope your item is found soon.",
                'keyword'    => 'left on plane, forgot on plane, left item, lost item plane',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // =====================================================================
            // GENERAL AIRPORT INFORMATION — English
            // =====================================================================
            [
                'question'   => 'Is it permissible to bring medicines on the plane?',
                'answer'     => "Hello, thank you for your question. Passengers are permitted to bring medication as long as they comply with applicable procedures and inspections.\nWe hope this helps.",
                'keyword'    => 'medicine, medication, drugs, bring medicine',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Can I bring pets?',
                'answer'     => "Hello, thank you for your question. Passengers are permitted to bring pets, subject to applicable airline regulations. Please check with your airline first.\nThank you.",
                'keyword'    => 'pets, animals, pet on plane, bring pets',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Is the airport open 24 hours or not?',
                'answer'     => "Hello, thank you for your question. The airport isn't open 24 hours a day and has specific operating hours.\nWe hope this helps.",
                'keyword'    => '24 hours, open hours, airport hours, operating hours',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'What is the airport operating hours?',
                'answer'     => "Hello, thank you for your question. The airport isn't open 24 hours a day and has specific operating hours.\nHope this helps.",
                'keyword'    => 'operating hours, airport hours, open time, closing time',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'What is the airport information number?',
                'answer'     => "Hello, thank you for your question. The airport information service number can be found on the airport's official website for easy assistance.\nWe hope this helps.",
                'keyword'    => 'phone number, contact number, information number, call center',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // =====================================================================
            // INFORMASI PENERBANGAN — Indonesian
            // =====================================================================
            [
                'question'   => 'Jam berapa maskapai penerbangan … berangkat?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Waktu keberangkatan penerbangan bergantung pada maskapai penerbangan yang Anda pertimbangkan. Silakan periksa situs web mereka atau layar informasi bandara.\nSemoga ini membantu.",
                'keyword'    => 'berangkat, jam berangkat, jadwal penerbangan, maskapai',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Jam berapa maskapai penerbangan … mendarat?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Waktu kedatangan penerbangan bergantung pada maskapai penerbangan yang Anda gunakan. Silakan periksa informasi terbaru di bandara.\nTerima kasih.",
                'keyword'    => 'mendarat, jam mendarat, kedatangan, waktu tiba',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Apakah ada penundaan untuk maskapai penerbangan …?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Informasi penundaan penerbangan bergantung pada kondisi operasional maskapai penerbangan. Silakan periksa situs web kami atau bandara untuk informasi terbaru.\nSemoga ini membantu.",
                'keyword'    => 'penundaan, delay, terlambat, jadwal terlambat',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Jam berapa boarding dimulai?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Waktu boarding ditentukan oleh masing-masing maskapai penerbangan dan dapat ditemukan di tiket Anda atau di situs web resmi kami.\nTerima kasih.",
                'keyword'    => 'boarding, jam boarding, naik pesawat',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Di mana gate saya?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Garuda Indonesia berada di Gate 1, sedangkan Citilink Indonesia, Batik Air, dan Wings Air berada di Gate 3 di lantai dua terminal keberangkatan.\nSemoga ini membantu.",
                'keyword'    => 'gate, gerbang, Garuda Indonesia, Citilink, Batik Air, Wings Air',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Apakah penerbangan saya tepat waktu?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Status penerbangan dapat berubah sewaktu-waktu. Silakan periksa layar informasi atau situs web bandara untuk informasi terbaru.\nTerima kasih.",
                'keyword'    => 'tepat waktu, status penerbangan, on time, jadwal',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Di mana saya bisa menemukan jadwal penerbangan?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Jadwal penerbangan dapat ditemukan di pintu masuk terminal dan di ruang tunggu keberangkatan lantai dua.\nSemoga ini membantu.",
                'keyword'    => 'jadwal penerbangan, jadwal, flight schedule, informasi penerbangan',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Bagaimana cuaca untuk penerbangan hari ini?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Informasi cuaca penerbangan dapat berubah sewaktu-waktu. Silakan periksa dengan sumber resmi yang relevan.\nTerima kasih.",
                'keyword'    => 'cuaca, weather, cuaca penerbangan, hari ini',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // =====================================================================
            // PROSEDUR CHECK-IN DAN BAGASI — Indonesian
            // =====================================================================
            [
                'question'   => 'Apa saja prosedur check-in?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Untuk melakukan check-in, Anda memerlukan tiket penerbangan dan kartu identitas Anda.\nSemoga ini membantu.",
                'keyword'    => 'prosedur check-in, check-in, cara check-in, tiket, identitas',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Di manakah lokasi loket check-in maskapai penerbangan?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Loket check-in terletak di lantai pertama terminal keberangkatan.\nTerima kasih.",
                'keyword'    => 'loket check-in, lokasi check-in, counter check-in, lantai pertama',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Apakah saya masih bisa check-in sekarang?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Ketersediaan check-in bergantung pada waktu dan kebijakan maskapai penerbangan.\nSemoga ini membantu.",
                'keyword'    => 'masih bisa check-in, check-in sekarang, check-in terlambat',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Berapa jam saya harus berada di bandara sebelum penerbangan saya?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Disarankan untuk tiba setidaknya 1,5 jam sebelum keberangkatan.\nTerima kasih.",
                'keyword'    => 'jam di bandara, tiba lebih awal, 1.5 jam, sebelum penerbangan',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Berapa berat maksimum bagasi?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Batas bagasi adalah 20 kg. Setiap kelebihan bagasi akan dikenakan biaya tambahan.\nSemoga ini membantu.",
                'keyword'    => 'berat bagasi, maksimum bagasi, 20 kg, kelebihan bagasi',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Berapa berat maksimum bagasi kabin?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Batas bagasi kabin adalah 7 kg.\nTerima kasih.",
                'keyword'    => 'bagasi kabin, cabin baggage, 7 kg, hand carry',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Ke mana saya harus pergi jika bagasi saya hilang?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Silakan laporkan ke bagian lost and found di bandara.\nSemoga ini membantu.",
                'keyword'    => 'bagasi hilang, kehilangan bagasi, lost and found',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Ke mana saya harus melaporkan bagasi yang rusak?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Bagasi yang rusak dapat dilaporkan ke bagian lost and found.\nTerima kasih.",
                'keyword'    => 'bagasi rusak, koper rusak, laporan bagasi',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // =====================================================================
            // FASILITAS BANDARA — Indonesian
            // =====================================================================
            [
                'question'   => 'Apakah ada area merokok?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Area merokok tersedia di lantai dua terminal keberangkatan.\nSemoga ini membantu.",
                'keyword'    => 'area merokok, merokok, rokok, smoking area',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Di mana stasiun pengisian dayanya?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Stasiun pengisian daya tersedia di berbagai area bandara.\nTerima kasih.",
                'keyword'    => 'pengisian daya, charger, colokan, charging station',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Di mana toiletnya?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Toilet tersedia di area keberangkatan, kedatangan, dan parkir.\nSemoga ini membantu.",
                'keyword'    => 'toilet, WC, kamar mandi, toilet bandara',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Di mana ruang salatnya?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Ruang salat berada di lantai dua terminal keberangkatan, dan masjid berada di area parkir.\nTerima kasih.",
                'keyword'    => 'ruang salat, mushola, masjid, tempat sholat',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Di mana ATM-nya?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. ATM terletak di luar terminal keberangkatan dekat toilet.\nSemoga ini membantu.",
                'keyword'    => 'ATM, mesin ATM, uang tunai, tarik tunai',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Apakah ada tempat penukaran uang?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Saat ini tidak ada tempat penukaran uang di dalam bandara.\nTerima kasih.",
                'keyword'    => 'penukaran uang, money changer, tukar uang, valuta asing',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Di mana letak klinik atau pusat medisnya?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Klinik tersebut berada di lantai pertama terminal keberangkatan.\nSemoga ini membantu.",
                'keyword'    => 'klinik, pusat medis, dokter, kesehatan, pertolongan pertama',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Di mana ruang bayi / ruang ibu & anak?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Ruang bayi / ruang ibu & anak tersedia di terminal keberangkatan dan kedatangan.\nTerima kasih.",
                'keyword'    => 'ruang bayi, ruang ibu anak, nursery room, menyusui',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // =====================================================================
            // BANTUAN DAN AKSESIBILITAS PENUMPANG — Indonesian
            // =====================================================================
            [
                'question'   => 'Apakah layanan untuk penyandang disabilitas tersedia?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Bandara menyediakan layanan khusus untuk penumpang penyandang disabilitas untuk memastikan kenyamanan selama berada di bandara. Silakan hubungi staf jika Anda membutuhkan bantuan.\nTerima kasih.",
                'keyword'    => 'disabilitas, layanan disabilitas, penyandang disabilitas, aksesibilitas',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Apakah ada prosedur khusus untuk penyandang disabilitas?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Prosedur dan layanan khusus tersedia untuk penyandang disabilitas guna memastikan proses keberangkatan dan kedatangan yang nyaman.\nSemoga ini membantu.",
                'keyword'    => 'prosedur disabilitas, layanan khusus, penyandang disabilitas',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Di mana saya bisa meminta bantuan kursi roda?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Anda dapat meminta bantuan kursi roda melalui maskapai penerbangan Anda atau langsung dari staf bandara di area keberangkatan. Kami siap membantu Anda.\nTerima kasih.",
                'keyword'    => 'kursi roda, wheelchair, bantuan kursi roda, disabilitas',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Dompetku hilang, aku harus pergi ke mana?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Jika Anda kehilangan dompet, silakan segera menuju ke konter informasi bandara untuk bantuan lebih lanjut. Kami berharap barang-barang Anda segera ditemukan.\nTerima kasih.",
                'keyword'    => 'dompet hilang, kehilangan dompet, barang hilang',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Di mana letak meja informasi?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Meja informasi terletak di lantai pertama terminal keberangkatan dan siap membantu Anda dengan segala kebutuhan informasi. Silakan langsung menuju ke lokasi tersebut.\nTerima kasih.",
                'keyword'    => 'meja informasi, konter informasi, customer service, bantuan',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // =====================================================================
            // LAYANAN TIKET DAN MASKAPAI PENERBANGAN — Indonesian
            // =====================================================================
            [
                'question'   => 'Jika ingin membeli tiket pesawat, di bagian mana?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Anda dapat membeli tiket pesawat di loket tiket yang terletak di lantai pertama terminal keberangkatan.\nSemoga ini membantu.",
                'keyword'    => 'beli tiket, tiket pesawat, loket tiket, pembelian tiket',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Saya ketinggalan penerbangan, apa yang harus saya lakukan?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Jika Anda ketinggalan penerbangan, Anda dapat membeli tiket untuk penerbangan berikutnya atau menghubungi maskapai penerbangan untuk mengetahui pilihan apa yang tersedia.\nKami harap Anda menemukan solusi terbaik.",
                'keyword'    => 'ketinggalan pesawat, miss flight, terlambat, pesawat berikutnya',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Di mana saya bisa menjadwalkan ulang tiket saya?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Penjadwalan ulang tiket dapat dilakukan di konter maskapai penerbangan atau melalui aplikasi online tempat Anda membeli tiket.\nSemoga ini membantu.",
                'keyword'    => 'jadwal ulang, reschedule, ganti jadwal, ubah tiket',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Di mana saya bisa mendapatkan pengembalian uang tiket?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Permintaan pengembalian dana dapat dilakukan di konter maskapai penerbangan atau melalui aplikasi online yang digunakan saat membeli tiket. Silakan ikuti prosedur yang berlaku.\nTerima kasih.",
                'keyword'    => 'pengembalian uang, refund, batal tiket, refund tiket',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // =====================================================================
            // LAYANAN TRANSPORTASI DAN PENJEMPUTAN — Indonesian
            // =====================================================================
            [
                'question'   => 'Di mana lokasi penjemputannya?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Area penjemputan penumpang terletak di terminal kedatangan. Silakan menuju ke area tersebut.\nTerima kasih.",
                'keyword'    => 'penjemputan, jemput, terminal kedatangan, pick up',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Apakah diperbolehkan memesan ojek online ke bandara?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Saat ini, ojek online tidak diizinkan masuk ke bandara untuk menjemput penumpang.\nTerima kasih atas pengertian Anda.",
                'keyword'    => 'ojek online, gojek, grab, motor, ojek',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Di mana taksi bandara?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Taksi bandara tersedia di luar terminal kedatangan dan dapat langsung digunakan oleh penumpang.\nSemoga ini membantu.",
                'keyword'    => 'taksi, taksi bandara, taxi, transport',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Berapa tarif taksi bandara?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Tarif taksi bandara bergantung pada jarak ke tujuan Anda. Untuk informasi lebih lanjut, silakan bertanya langsung di konter taksi bandara.\nSemoga ini membantu.",
                'keyword'    => 'tarif taksi, harga taksi, biaya taksi, ongkos taksi',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Apakah tersedia transportasi ke Batu?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Transportasi ke Batu tersedia, dan taksi bandara juga tersedia.\nSemoga perjalanan Anda lancar.",
                'keyword'    => 'transportasi ke Batu, Batu, taksi ke Batu',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // =====================================================================
            // LOST AND FOUND — Indonesian
            // =====================================================================
            [
                'question'   => 'Di mana tempat barang hilang dan ditemukan?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Layanan barang hilang dan ditemukan terletak di dalam terminal kedatangan. Silakan langsung menuju lokasi tersebut.\nTerima kasih.",
                'keyword'    => 'barang hilang, lost and found, kehilangan, barang ketinggalan',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Saya meninggalkan barang-barang saya di pesawat, apa yang harus saya lakukan?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Jika Anda meninggalkan barang di pesawat, harap segera hubungi petugas informasi bandara melalui saluran resmi seperti Instagram, email, atau pusat panggilan.\nKami berharap barang Anda segera ditemukan.",
                'keyword'    => 'barang tertinggal, ketinggalan di pesawat, lupa di pesawat',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // =====================================================================
            // INFORMASI UMUM BANDARA — Indonesian
            // =====================================================================
            [
                'question'   => 'Apakah diperbolehkan membawa obat-obatan ke dalam pesawat?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Penumpang diperbolehkan membawa obat-obatan selama mereka mematuhi prosedur dan pemeriksaan yang berlaku.\nSemoga ini membantu.",
                'keyword'    => 'obat-obatan, bawa obat, membawa obat, medikasi',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Apakah saya boleh membawa hewan peliharaan?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Penumpang diperbolehkan membawa hewan peliharaan, dengan tunduk pada peraturan maskapai penerbangan yang berlaku. Silakan periksa terlebih dahulu dengan maskapai penerbangan Anda.\nTerima kasih.",
                'keyword'    => 'hewan peliharaan, bawa hewan, pets, binatang',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Apakah bandara buka 24 jam atau tidak?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Bandara tidak buka 24 jam sehari dan memiliki jam operasional tertentu.\nSemoga ini membantu.",
                'keyword'    => '24 jam, buka, jam operasional, bandara buka',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Jam berapa bandara beroperasi?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Bandara tidak buka 24 jam sehari dan memiliki jam operasional tertentu.\nSemoga ini membantu.",
                'keyword'    => 'jam operasional, jam buka, jam tutup, operasional bandara',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'question'   => 'Berapa nomor informasi bandara?',
                'answer'     => "Halo, terima kasih atas pertanyaan Anda. Nomor layanan informasi bandara dapat ditemukan di situs web resmi bandara untuk memudahkan Anda mendapatkan bantuan.\nSemoga ini membantu.",
                'keyword'    => 'nomor informasi, nomor telepon, kontak bandara, call center',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('faqs')->insert($faqs);
    }
}
