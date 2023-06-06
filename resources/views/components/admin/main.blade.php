<div class="w-11/12 h-screen overflow-y-scroll no-scrollbar">
    @if($current=="Home")
        <div class="w-full h-full p-5 grid grid-cols-8 grid-rows-6 gap-5">
            <div class="w-full p-5 col-span-8 row-span-1 rounded-lg bg-white shadow-lg">
                <h2 class="text-3xl font-semibold">Hello, {{ $user }}.</h2>
                <p class="text-md text-gray-400">What do you want to do today?</p>
            </div>
            <div class="w-full p-5 col-span-4 row-span-1 rounded-lg bg-white shadow-lg">
                <div class="w-full h-full">
                    <div>
                        <h2 class="text-3xl font-semibold">Here are Today's Sales.</h2>
                        <p class="text-md text-gray-400">Looking Good Huh?</p>
                    </div>
                </div>
            </div>
            <div class="w-full p-5 col-span-4 row-span-1 rounded-lg bg-white shadow-lg">
                <div class="w-full h-full">
                    <div>
                        <h2 class="text-3xl font-semibold">And here are the Stocks.</h2>
                        <p class="text-md text-gray-400">Seems like they're running out fast.</p>
                    </div>
                </div>

            </div>
            <div class="w-full p-5 col-span-4 row-span-4 flex justify-center items-center rounded-lg bg-white shadow-lg">
                <div class="w-3/4"><canvas id="sales"></canvas></div>
            </div>
            <div class="w-full p-5 col-span-4 row-span-4 flex justify-center items-center rounded-lg bg-white shadow-lg">
                <div class="w-full"><canvas id="stock"></canvas></div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>
            <!-- Stocks Bar Chart -->
            <script>
                (async function() {
                    const labels = ['January', 'Febuary', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                    const data = {
                        labels: labels,
                        datasets: [{
                            label: 'Stocks',
                            data: [65, 59, 80, 81, 56, 55, 40, 37, 75, 82, 65, 58],
                            backgroundColor: [
                            'rgba(255, 0, 0, 0.2)',
                            'rgba(191, 63, 0, 0.2)',
                            'rgba(127, 127, 0, 0.2)',
                            'rgba(63, 191, 0, 0.2)',
                            'rgba(0, 255, 0, 0.2)',
                            'rgba(0, 191, 63, 0.2)',
                            'rgba(0, 127, 127, 0.2)',
                            'rgba(0, 63, 191, 0.2)',
                            'rgba(0, 0, 255, 0.2)',
                            'rgba(63, 0, 191, 0.2)',
                            'rgba(127, 0, 127, 0.2)',
                            'rgba(191, 0, 63, 0.2)',
                            ],
                            borderColor: [
                            'rgb(255, 0, 0)',
                            'rgb(191, 63, 0)',
                            'rgb(127, 127, 0)',
                            'rgb(63, 191, 0)',
                            'rgb(0, 255, 0)',
                            'rgb(0, 191, 63)',
                            'rgb(0, 127, 127)',
                            'rgb(0, 63, 191)',
                            'rgb(0, 0, 255)',
                            'rgb(63, 0, 191)',
                            'rgb(127, 0, 127)',
                            'rgb(191, 0, 63)',
                            ],
                            borderWidth: 1
                        }]
                    };

                    const config = {
                        type: 'bar',
                        data: data,
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        },
                    };
                    new Chart(document.getElementById('stock'), config);
                })();
            </script>
            <!-- Sales Pie Chart -->
            <script>
                (async function() {
                    const data = {
                        labels: [
                            'Almond Power',
                            'Coco Delight',
                            'Crunchy Cashew',
                            'Tasty Nutty',
                            'Raisin Shine'
                        ],
                        datasets: [{
                            label: 'Sales',
                            data: [300, 125, 100, 200, 150],
                            backgroundColor: [
                                '#317AAD',
                                '#01A79B',
                                '#D44C26',
                                '#DFA51F',
                                '#4B3681'
                            ],
                            hoverOffset: 4
                        }]
                    };

                    const config = {
                        type: 'doughnut',
                        data: data,
                    };
                    new Chart(document.getElementById('sales'), config);
                })();
            </script>
        </div>
    @elseif($current=="Operator")
        <livewire:show-operators></livewire:show-operators>
    @elseif($current=="OpEditor")
        <livewire:edit-operators></livewire:edit-operators>
    @elseif($current=="Globe")
        <div class="w-full h-full p-5">
            Web Panel
        </div>
    @elseif($current=="Settings")
        <div class="w-full h-full p-5">
            Settings Panel
        </div>
    @endif
</div>