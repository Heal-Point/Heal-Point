<x-app-layout>
    <!-- Doctor Details Section -->
    <section class="pt-5 pb-5">
        <div class="container">
            <div class="row">
                <!-- Left Side - Doctor Info -->
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="bg-white p-6 rounded-xl shadow sticky top-4">
                        <div class="text-center">
                            <div class="relative inline-block">
                                <img src="/images/team/1.jpg"
                                     class="rounded-full h-40 w-40 border-4 border-white shadow-md object-cover"
                                     alt="Doctor profile">
                                <div class="absolute bottom-0 right-0 bg-green-500 text-white p-1 rounded-full">
                                    <i class="icofont-check-circled text-xl"></i>
                                </div>
                            </div>

                            <h2 class="mt-4 text-xl font-bold text-gray-900">Dr. Sarah Johnson</h2>
                            <p class="text-md text-primary font-medium">Cardiologist</p>

                            <div class="flex items-center justify-center mt-2">
                                <div class="flex text-yellow-400 mr-2">
                                    <i class="icofont-star"></i>
                                    <i class="icofont-star"></i>
                                    <i class="icofont-star"></i>
                                    <i class="icofont-star"></i>
                                    <i class="icofont-star"></i>
                                </div>
                                <span class="text-sm text-gray-500">(124 reviews)</span>
                            </div>

                            <div class="flex justify-center gap-2 mt-4">
                                <button class="btn btn-outline-primary btn-sm">
                                    <i class="icofont-ui-messaging mr-1"></i> Message
                                </button>
                                <button class="btn btn-outline-primary btn-sm">
                                    <i class="icofont-share mr-1"></i> Share
                                </button>
                            </div>

                            <hr class="my-4 border-gray-200">

                            <div class="space-y-3 text-left">
                                <div class="flex items-center">
                                    <div class="bg-gray-100 p-2 rounded-full mr-3">
                                        <i class="icofont-location-pin text-primary"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">Location</p>
                                        <p class="text-sm text-gray-600">Royal Hospital, 5th Circle, Amman</p>
                                    </div>
                                </div>

                                <div class="flex items-center">
                                    <div class="bg-gray-100 p-2 rounded-full mr-3">
                                        <i class="icofont-money-bag text-primary"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">Consultation Fee</p>
                                        <p class="text-sm text-gray-600">$60 - $80</p>
                                    </div>
                                </div>

                                <div class="flex items-center">
                                    <div class="bg-gray-100 p-2 rounded-full mr-3">
                                        <i class="icofont-clock-time text-primary"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">Average Waiting Time</p>
                                        <p class="text-sm text-gray-600">15-30 minutes</p>
                                    </div>
                                </div>

                                <div class="flex items-center">
                                    <div class="bg-gray-100 p-2 rounded-full mr-3">
                                        <i class="icofont-badge text-primary"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">Experience</p>
                                        <p class="text-sm text-gray-600">12 years</p>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4 border-gray-200">

                            <div class="text-left">
                                <h4 class="font-medium text-gray-900 mb-2">About Dr. Sarah Johnson</h4>
                                <p class="text-sm text-gray-600">
                                    Dr. Sarah Johnson is a board-certified cardiologist with over 12 years of experience in treating
                                    cardiovascular diseases. She completed her residency at Johns Hopkins Hospital and specializes
                                    in interventional cardiology and preventive cardiology.
                                </p>
                                <p class="text-sm text-gray-600 mt-2">
                                    Her approach focuses on personalized care and patient education to help individuals maintain
                                    optimal heart health throughout their lives.
                                </p>
                            </div>

                            <hr class="my-4 border-gray-200">

                            <div class="text-left">
                                <h4 class="font-medium text-gray-900 mb-2">Specializations</h4>
                                <div class="flex flex-wrap gap-2">
                                    <span class="bg-gray-100 text-gray-800 text-xs px-3 py-1 rounded-full">Coronary Artery Disease</span>
                                    <span class="bg-gray-100 text-gray-800 text-xs px-3 py-1 rounded-full">Heart Failure</span>
                                    <span class="bg-gray-100 text-gray-800 text-xs px-3 py-1 rounded-full">Hypertension</span>
                                    <span class="bg-gray-100 text-gray-800 text-xs px-3 py-1 rounded-full">Arrhythmia</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Appointment Panel -->
                <div class="col-lg-8">
                    <div class="bg-white rounded-xl shadow">
                        <!-- Appointment Info -->
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Book an Appointment</h3>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                                <div class="bg-gray-50 p-3 rounded-lg">
                                    <p class="text-sm font-medium text-gray-500">Consultation Fee</p>
                                    <p class="text-md font-bold text-primary">$60 - $80</p>
                                </div>
                                <div class="bg-gray-50 p-3 rounded-lg">
                                    <p class="text-sm font-medium text-gray-500">Average Waiting Time</p>
                                    <p class="text-md font-bold text-primary">15-30 min</p>
                                </div>
                                <div class="bg-gray-50 p-3 rounded-lg">
                                    <p class="text-sm font-medium text-gray-500">Next Available</p>
                                    <p class="text-md font-bold text-primary">Tomorrow, 9:00 AM</p>
                                </div>
                            </div>
                            <p class="text-sm text-gray-600">
                                <i class="icofont-info-circle text-primary mr-1"></i>
                                Please select your preferred date and time from the available slots below.
                            </p>
                        </div>

                        <!-- Calendar Navigation -->
                        <div class="p-4 border-b border-gray-200 flex justify-between items-center">
                            <button class="btn btn-outline-primary btn-sm">
                                <i class="icofont-rounded-left"></i> Previous
                            </button>
                            <h4 class="font-medium text-gray-900">Next 14 Days</h4>
                            <button class="btn btn-outline-primary btn-sm">
                                Next <i class="icofont-rounded-right"></i>
                            </button>
                        </div>

                        <!-- Date Selection -->
                        <div class="p-4 border-b border-gray-200 overflow-x-auto">
                            <div class="flex space-x-2" style="min-width: max-content;">
                                <!-- Date Buttons (14 days) -->
                                <button class="date-btn flex flex-col items-center justify-center px-4 py-2 rounded-lg border border-gray-200 hover:border-primary hover:bg-primary-50 min-w-[70px]">
                                    <span class="text-sm font-medium">Tomorrow</span>
                                    <span class="text-xs text-gray-500">Jun 15</span>
                                </button>
                                <button class="date-btn flex flex-col items-center justify-center px-4 py-2 rounded-lg border border-gray-200 hover:border-primary hover:bg-primary-50 min-w-[70px]">
                                    <span class="text-sm font-medium">Fri</span>
                                    <span class="text-xs text-gray-500">Jun 16</span>
                                </button>
                                <button class="date-btn flex flex-col items-center justify-center px-4 py-2 rounded-lg border border-gray-200 hover:border-primary hover:bg-primary-50 min-w-[70px]">
                                    <span class="text-sm font-medium">Sat</span>
                                    <span class="text-xs text-gray-500">Jun 17</span>
                                </button>
                                <button class="date-btn flex flex-col items-center justify-center px-4 py-2 rounded-lg border border-gray-200 hover:border-primary hover:bg-primary-50 min-w-[70px]">
                                    <span class="text-sm font-medium">Sun</span>
                                    <span class="text-xs text-gray-500">Jun 18</span>
                                </button>
                                <button class="date-btn flex flex-col items-center justify-center px-4 py-2 rounded-lg border border-gray-200 hover:border-primary hover:bg-primary-50 min-w-[70px]">
                                    <span class="text-sm font-medium">Mon</span>
                                    <span class="text-xs text-gray-500">Jun 19</span>
                                </button>
                                <button class="date-btn flex flex-col items-center justify-center px-4 py-2 rounded-lg border border-gray-200 hover:border-primary hover:bg-primary-50 min-w-[70px]">
                                    <span class="text-sm font-medium">Tue</span>
                                    <span class="text-xs text-gray-500">Jun 20</span>
                                </button>
                                <button class="date-btn flex flex-col items-center justify-center px-4 py-2 rounded-lg border border-gray-200 hover:border-primary hover:bg-primary-50 min-w-[70px]">
                                    <span class="text-sm font-medium">Wed</span>
                                    <span class="text-xs text-gray-500">Jun 21</span>
                                </button>
                                <button class="date-btn flex flex-col items-center justify-center px-4 py-2 rounded-lg border border-gray-200 hover:border-primary hover:bg-primary-50 min-w-[70px]">
                                    <span class="text-sm font-medium">Thu</span>
                                    <span class="text-xs text-gray-500">Jun 22</span>
                                </button>
                                <button class="date-btn flex flex-col items-center justify-center px-4 py-2 rounded-lg border border-gray-200 hover:border-primary hover:bg-primary-50 min-w-[70px]">
                                    <span class="text-sm font-medium">Fri</span>
                                    <span class="text-xs text-gray-500">Jun 23</span>
                                </button>
                                <button class="date-btn flex flex-col items-center justify-center px-4 py-2 rounded-lg border border-gray-200 hover:border-primary hover:bg-primary-50 min-w-[70px]">
                                    <span class="text-sm font-medium">Sat</span>
                                    <span class="text-xs text-gray-500">Jun 24</span>
                                </button>
                                <button class="date-btn flex flex-col items-center justify-center px-4 py-2 rounded-lg border border-gray-200 hover:border-primary hover:bg-primary-50 min-w-[70px]">
                                    <span class="text-sm font-medium">Sun</span>
                                    <span class="text-xs text-gray-500">Jun 25</span>
                                </button>
                                <button class="date-btn flex flex-col items-center justify-center px-4 py-2 rounded-lg border border-gray-200 hover:border-primary hover:bg-primary-50 min-w-[70px]">
                                    <span class="text-sm font-medium">Mon</span>
                                    <span class="text-xs text-gray-500">Jun 26</span>
                                </button>
                                <button class="date-btn flex flex-col items-center justify-center px-4 py-2 rounded-lg border border-gray-200 hover:border-primary hover:bg-primary-50 min-w-[70px]">
                                    <span class="text-sm font-medium">Tue</span>
                                    <span class="text-xs text-gray-500">Jun 27</span>
                                </button>
                                <button class="date-btn flex flex-col items-center justify-center px-4 py-2 rounded-lg border border-gray-200 hover:border-primary hover:bg-primary-50 min-w-[70px]">
                                    <span class="text-sm font-medium">Wed</span>
                                    <span class="text-xs text-gray-500">Jun 28</span>
                                </button>
                            </div>
                        </div>

                        <!-- Time Slots -->
                        <div class="p-4">
                            <h4 class="font-medium text-gray-900 mb-3">Available Time Slots</h4>
                            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3">
                                <!-- Time Slot Buttons (9AM-5PM) -->
                                <button onclick="openAppointmentModal('Tomorrow, 9:00 AM')" class="time-slot-btn py-2 px-3 rounded-lg border border-gray-200 hover:border-primary hover:bg-primary-50 text-center">
                                    9:00 AM
                                </button>
                                <button onclick="openAppointmentModal('Tomorrow, 10:00 AM')" class="time-slot-btn py-2 px-3 rounded-lg border border-gray-200 hover:border-primary hover:bg-primary-50 text-center">
                                    10:00 AM
                                </button>
                                <button onclick="openAppointmentModal('Tomorrow, 11:00 AM')" class="time-slot-btn py-2 px-3 rounded-lg border border-gray-200 hover:border-primary hover:bg-primary-50 text-center">
                                    11:00 AM
                                </button>
                                <button onclick="openAppointmentModal('Tomorrow, 12:00 PM')" class="time-slot-btn py-2 px-3 rounded-lg border border-gray-200 hover:border-primary hover:bg-primary-50 text-center">
                                    12:00 PM
                                </button>
                                <button onclick="openAppointmentModal('Tomorrow, 1:00 PM')" class="time-slot-btn py-2 px-3 rounded-lg border border-gray-200 hover:border-primary hover:bg-primary-50 text-center">
                                    1:00 PM
                                </button>
                                <button onclick="openAppointmentModal('Tomorrow, 2:00 PM')" class="time-slot-btn py-2 px-3 rounded-lg border border-gray-200 hover:border-primary hover:bg-primary-50 text-center">
                                    2:00 PM
                                </button>
                                <button onclick="openAppointmentModal('Tomorrow, 3:00 PM')" class="time-slot-btn py-2 px-3 rounded-lg border border-gray-200 hover:border-primary hover:bg-primary-50 text-center">
                                    3:00 PM
                                </button>
                                <button onclick="openAppointmentModal('Tomorrow, 4:00 PM')" class="time-slot-btn py-2 px-3 rounded-lg border border-gray-200 hover:border-primary hover:bg-primary-50 text-center">
                                    4:00 PM
                                </button>
                                <button onclick="openAppointmentModal('Tomorrow, 5:00 PM')" class="time-slot-btn py-2 px-3 rounded-lg border border-gray-200 hover:border-primary hover:bg-primary-50 text-center">
                                    5:00 PM
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Doctor Reviews -->
                    <div class="bg-white rounded-xl shadow mt-6">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Patient Reviews</h3>
                            <div class="flex items-center mb-4">
                                <div class="flex items-center mr-4">
                                    <div class="text-3xl font-bold mr-2">4.8</div>
                                    <div class="flex flex-col">
                                        <div class="flex text-yellow-400">
                                            <i class="icofont-star"></i>
                                            <i class="icofont-star"></i>
                                            <i class="icofont-star"></i>
                                            <i class="icofont-star"></i>
                                            <i class="icofont-star"></i>
                                        </div>
                                        <div class="text-sm text-gray-500">124 reviews</div>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center mb-1">
                                        <span class="text-sm w-10">5 stars</span>
                                        <div class="flex-1 bg-gray-200 rounded-full h-2 mx-2">
                                            <div class="bg-yellow-400 h-2 rounded-full" style="width: 85%"></div>
                                        </div>
                                        <span class="text-sm text-gray-500">85%</span>
                                    </div>
                                    <div class="flex items-center mb-1">
                                        <span class="text-sm w-10">4 stars</span>
                                        <div class="flex-1 bg-gray-200 rounded-full h-2 mx-2">
                                            <div class="bg-yellow-400 h-2 rounded-full" style="width: 10%"></div>
                                        </div>
                                        <span class="text-sm text-gray-500">10%</span>
                                    </div>
                                    <div class="flex items-center mb-1">
                                        <span class="text-sm w-10">3 stars</span>
                                        <div class="flex-1 bg-gray-200 rounded-full h-2 mx-2">
                                            <div class="bg-yellow-400 h-2 rounded-full" style="width: 3%"></div>
                                        </div>
                                        <span class="text-sm text-gray-500">3%</span>
                                    </div>
                                    <div class="flex items-center mb-1">
                                        <span class="text-sm w-10">2 stars</span>
                                        <div class="flex-1 bg-gray-200 rounded-full h-2 mx-2">
                                            <div class="bg-yellow-400 h-2 rounded-full" style="width: 1%"></div>
                                        </div>
                                        <span class="text-sm text-gray-500">1%</span>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="text-sm w-10">1 star</span>
                                        <div class="flex-1 bg-gray-200 rounded-full h-2 mx-2">
                                            <div class="bg-yellow-400 h-2 rounded-full" style="width: 1%"></div>
                                        </div>
                                        <span class="text-sm text-gray-500">1%</span>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-outline-primary btn-sm">
                                <i class="icofont-pen mr-1"></i> Write a Review
                            </button>
                        </div>

                        <!-- Reviews List -->
                        <div class="p-6">
                            <div class="space-y-6">
                                <!-- Review 1 -->
                                <div class="flex">
                                    <img src="https://dummyimage.com/60x60/6a5acd/ffffff?text=PT"
                                         class="rounded-full h-12 w-12 border-2 border-white shadow mr-4"
                                         alt="Patient">
                                    <div class="flex-1">
                                        <div class="flex justify-between items-start mb-1">
                                            <h4 class="font-medium text-gray-900">Mohammad Ali</h4>
                                            <span class="text-xs text-gray-500">2 weeks ago</span>
                                        </div>
                                        <div class="flex text-yellow-400 mb-2">
                                            <i class="icofont-star"></i>
                                            <i class="icofont-star"></i>
                                            <i class="icofont-star"></i>
                                            <i class="icofont-star"></i>
                                            <i class="icofont-star"></i>
                                        </div>
                                        <p class="text-sm text-gray-600">
                                            Dr. Johnson is an excellent cardiologist. She took the time to explain everything
                                            about my condition and treatment options. Her bedside manner is wonderful and
                                            she made me feel very comfortable.
                                        </p>
                                    </div>
                                </div>

                                <!-- Review 2 -->
                                <div class="flex">
                                    <img src="https://dummyimage.com/60x60/6a5acd/ffffff?text=PT"
                                         class="rounded-full h-12 w-12 border-2 border-white shadow mr-4"
                                         alt="Patient">
                                    <div class="flex-1">
                                        <div class="flex justify-between items-start mb-1">
                                            <h4 class="font-medium text-gray-900">Aisha Mahmoud</h4>
                                            <span class="text-xs text-gray-500">1 month ago</span>
                                        </div>
                                        <div class="flex text-yellow-400 mb-2">
                                            <i class="icofont-star"></i>
                                            <i class="icofont-star"></i>
                                            <i class="icofont-star"></i>
                                            <i class="icofont-star"></i>
                                            <i class="icofont-star"></i>
                                        </div>
                                        <p class="text-sm text-gray-600">
                                            I've been seeing Dr. Johnson for my heart condition for 3 years now.
                                            She's always professional, knowledgeable, and caring. The clinic staff
                                            is also very friendly and efficient.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-outline-primary btn-sm w-full mt-4">
                                <i class="icofont-refresh mr-1"></i> Load More Reviews
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Appointment Modal -->
    <div id="appointmentModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-md mx-4">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold text-gray-900">Book Appointment</h3>
                    <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">
                        <i class="icofont-close text-xl"></i>
                    </button>
                </div>

                <div class="mb-4 p-3 bg-primary-50 rounded-lg">
                    <h4 class="font-medium text-gray-900 mb-1" id="selectedSlot">Tomorrow, 9:00 AM</h4>
                    <p class="text-sm text-gray-600">Dr. Sarah Johnson - Cardiology Consultation</p>
                </div>

                <form id="appointmentForm">
                    <div class="mb-4">
                        <label for="appointmentReason" class="block text-sm font-medium text-gray-700 mb-1">Reason for Appointment</label>
                        <textarea id="appointmentReason" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="Briefly describe your symptoms or reason for visit"></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="patientName" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                        <input type="text" id="patientName" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" value="John Doe">
                    </div>

                    <div class="mb-4">
                        <label for="patientPhone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                        <input type="tel" id="patientPhone" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" value="+1 234 567 890">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Payment Method</label>
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <input id="cash" name="payment" type="radio" class="h-4 w-4 text-primary focus:ring-primary border-gray-300">
                                <label for="cash" class="ml-2 block text-sm text-gray-700">Pay at Clinic</label>
                            </div>
                            <div class="flex items-center">
                                <input id="card" name="payment" type="radio" class="h-4 w-4 text-primary focus:ring-primary border-gray-300">
                                <label for="card" class="ml-2 block text-sm text-gray-700">Credit/Debit Card</label>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 mt-6">
                        <button type="button" onclick="closeModal()" class="btn btn-outline-primary">Cancel</button>
                        <button type="submit" class="btn btn-main">Confirm Booking</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Open appointment modal with selected time
        function openAppointmentModal(time) {
            document.getElementById('selectedSlot').textContent = time;
            document.getElementById('appointmentModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        // Close modal
        function closeModal() {
            document.getElementById('appointmentModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Handle form submission
        document.getElementById('appointmentForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Here you would typically send the data to your backend
            alert('Appointment booked successfully!');
            closeModal();
        });

        // Highlight selected date
        const dateButtons = document.querySelectorAll('.date-btn');
        dateButtons.forEach(button => {
            button.addEventListener('click', function() {
                dateButtons.forEach(btn => btn.classList.remove('border-primary', 'bg-primary-50', 'text-primary'));
                this.classList.add('border-primary', 'bg-primary-50', 'text-primary');
            });
        });

        // Highlight selected time slot
        const timeButtons = document.querySelectorAll('.time-slot-btn');
        timeButtons.forEach(button => {
            button.addEventListener('click', function() {
                timeButtons.forEach(btn => btn.classList.remove('border-primary', 'bg-primary-50', 'text-primary'));
                this.classList.add('border-primary', 'bg-primary-50', 'text-primary');
            });
        });
    </script>
</x-app-layout>
