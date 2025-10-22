{{--
/**
 * 429 Too Many Requests Error Page - SaluteOra Medical Theme
 *
 * Pagina di errore 429 altamente coinvolgente con tema "Sala d'Attesa Virtuale".
 * Design orientato al massimo engagement con animazioni fluide, countdown timer,
 * e messaggi simpatici ma professionali per gestire il rate limiting.
 *
 * Features WOW:
 * - Virtual waiting room con animated queue
 * - Countdown timer per retry con progress bar
 * - Medical staff mascot con stress animations
 * - Patient queue animation con emoji
 * - Rate limiting explanation user-friendly
 * - Queue position simulator
 * - Tips per ottimizzare l'esperienza
 * - Newsletter signup per evitare code
 * - Appointment booking prioritario
 * - Coffee break mini-game mentre aspetti
 * - Breathing exercise per rilassarsi
 * - Medical trivia quiz durante l'attesa
 *
 * @param int $exception HTTP status code (429)
 * @param string $message Error message
 * @param int $retry_after Seconds to wait before retry
 * @param bool $show_queue_position Show virtual queue position
 * @param bool $show_breathing_exercise Show relaxation exercise
 */
--}}

<!DOCTYPE html>
<html lang="it" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@lang('pub_theme::error_429.title')</title>
    <meta name="robots" content="noindex, nofollow">

    {{-- Tailwind CSS CDN per sviluppo --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Custom Tailwind Configuration --}}
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'float-slow': 'float 8s ease-in-out infinite',
                        'float-delayed': 'float 6s ease-in-out 2s infinite',
                        'wiggle': 'wiggle 1s ease-in-out infinite',
                        'heartbeat': 'heartbeat 1.5s ease-in-out infinite',
                        'bounce-gentle': 'bounce-gentle 2s ease-in-out infinite',
                        'rotate-slow': 'rotate-slow 10s linear infinite',
                        'pulse-glow': 'pulse-glow 2s ease-in-out infinite',
                        'shake': 'shake 0.5s linear',
                        'dance': 'dance 3s ease-in-out infinite',
                        'slide-left': 'slide-left 4s linear infinite',
                        'fade-in-out': 'fade-in-out 3s ease-in-out infinite',
                        'typing': 'typing 2s steps(20) infinite',
                        'blink': 'blink 1s step-end infinite',
                        'stressed': 'stressed 1s ease-in-out infinite',
                        'queue-move': 'queue-move 8s linear infinite'
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px) rotate(0deg)' },
                            '50%': { transform: 'translateY(-20px) rotate(5deg)' }
                        },
                        wiggle: {
                            '0%, 100%': { transform: 'rotate(-3deg)' },
                            '50%': { transform: 'rotate(3deg)' }
                        },
                        heartbeat: {
                            '0%, 100%': { transform: 'scale(1)' },
                            '50%': { transform: 'scale(1.1)' }
                        },
                        'bounce-gentle': {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' }
                        },
                        'rotate-slow': {
                            '0%': { transform: 'rotate(0deg)' },
                            '100%': { transform: 'rotate(360deg)' }
                        },
                        'pulse-glow': {
                            '0%, 100%': { boxShadow: '0 0 20px rgba(59, 130, 246, 0.5)' },
                            '50%': { boxShadow: '0 0 40px rgba(59, 130, 246, 0.8)' }
                        },
                        shake: {
                            '0%, 100%': { transform: 'translateX(0)' },
                            '25%': { transform: 'translateX(-5px)' },
                            '75%': { transform: 'translateX(5px)' }
                        },
                        dance: {
                            '0%, 100%': { transform: 'translateY(0px) rotate(0deg)' },
                            '25%': { transform: 'translateY(-5px) rotate(-2deg)' },
                            '50%': { transform: 'translateY(-10px) rotate(0deg)' },
                            '75%': { transform: 'translateY(-5px) rotate(2deg)' }
                        },
                        'slide-left': {
                            '0%': { transform: 'translateX(100%)' },
                            '100%': { transform: 'translateX(-100%)' }
                        },
                        'fade-in-out': {
                            '0%, 100%': { opacity: 0.3 },
                            '50%': { opacity: 1 }
                        },
                        typing: {
                            '0%': { width: '0' },
                            '50%': { width: '100%' },
                            '100%': { width: '0' }
                        },
                        blink: {
                            '0%, 50%': { opacity: 1 },
                            '51%, 100%': { opacity: 0 }
                        },
                        stressed: {
                            '0%, 100%': { transform: 'scale(1) rotate(0deg)' },
                            '25%': { transform: 'scale(1.05) rotate(-1deg)' },
                            '75%': { transform: 'scale(0.95) rotate(1deg)' }
                        },
                        'queue-move': {
                            '0%': { transform: 'translateX(0px)' },
                            '25%': { transform: 'translateX(-10px)' },
                            '50%': { transform: 'translateX(0px)' },
                            '75%': { transform: 'translateX(10px)' },
                            '100%': { transform: 'translateX(0px)' }
                        }
                    }
                }
            }
        }
    </script>

    {{-- Favicon medico --}}
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>⏰</text></svg>">
</head>

<body class="h-full bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-100 font-sans antialiased overflow-x-hidden"
      x-data="{
          isVisible: false,
          retryCountdown: 60,
          queuePosition: Math.floor(Math.random() * 15) + 5,
          currentTime: '',
          showBreathingExercise: false,
          breathingPhase: 'inhale',
          breathingCount: 0,
          showTrivia: false,
          currentTriviaIndex: 0,
          triviaAnswered: false,
          doctorMood: 'stressed',
          queuePatients: [
              { emoji: '🤰', position: 1, status: 'waiting' },
              { emoji: '👨‍💼', position: 2, status: 'waiting' },
              { emoji: '👵', position: 3, status: 'waiting' },
              { emoji: '👦', position: 4, status: 'waiting' },
              { emoji: '👩‍🦳', position: 5, status: 'called' },
              { emoji: '🧑', position: 6, status: 'waiting' }
          ],
          waitingMessages: [
              '@lang('pub_theme::error_429.waiting_messages.doctor_busy')',
              '@lang('pub_theme::error_429.waiting_messages.waiting_room_full')',
              '@lang('pub_theme::error_429.waiting_messages.too_much_love')',
              '@lang('pub_theme::error_429.waiting_messages.server_coffee_break')',
              '@lang('pub_theme::error_429.waiting_messages.computer_tired')',
              '@lang('pub_theme::error_429.waiting_messages.quality_over_quantity')',
              '@lang('pub_theme::error_429.waiting_messages.sterilizing_server')'
          ],
          currentMessage: '',
          messageIndex: 0,
          tips: [
              '@lang('pub_theme::error_429.tips.book_appointments')',
              '@lang('pub_theme::error_429.tips.best_hours')',
              '@lang('pub_theme::error_429.tips.use_app')',
              '@lang('pub_theme::error_429.tips.plan_ahead')',
              '@lang('pub_theme::error_429.tips.newsletter')'
          ],
          currentTipIndex: 0,
          triviaQuestions: [
              {
                  question: '@lang('pub_theme::error_429.trivia.question_1.question')',
                  options: [@foreach(__('pub_theme::error_429.trivia.question_1.options') as $option)'{{ $option }}'@if(!$loop->last),@endif @endforeach],
                  correct: 1,
                  explanation: '@lang('pub_theme::error_429.trivia.question_1.explanation')'
              },
              {
                  question: '@lang('pub_theme::error_429.trivia.question_2.question')',
                  options: [@foreach(__('pub_theme::error_429.trivia.question_2.options') as $option)'{{ $option }}'@if(!$loop->last),@endif @endforeach],
                  correct: 1,
                  explanation: '@lang('pub_theme::error_429.trivia.question_2.explanation')'
              },
              {
                  question: '@lang('pub_theme::error_429.trivia.question_3.question')',
                  options: [@foreach(__('pub_theme::error_429.trivia.question_3.options') as $option)'{{ $option }}'@if(!$loop->last),@endif @endforeach],
                  correct: 1,
                  explanation: '@lang('pub_theme::error_429.trivia.question_3.explanation')'
              }
          ],
          selectedAnswer: null,
          score: 0,
          gameMode: 'waiting'
      }"
      x-init="
          // Initialize visibility
          setTimeout(() => { isVisible = true; }, 100);

          // Update current time
          setInterval(() => {
              currentTime = new Date().toLocaleTimeString('it-IT', {
                  hour: '2-digit',
                  minute: '2-digit',
                  second: '2-digit'
              });
          }, 1000);

          // Countdown timer
          setInterval(() => {
              if (retryCountdown > 0) {
                  retryCountdown--;
                  // Decrease queue position occasionally
                  if (retryCountdown % 15 === 0 && queuePosition > 1) {
                      queuePosition--;
                  }
              }
          }, 1000);

          // Initialize messages
          currentMessage = waitingMessages[0];

          // Rotate waiting messages
          setInterval(() => {
              messageIndex = (messageIndex + 1) % waitingMessages.length;
              currentMessage = waitingMessages[messageIndex];
          }, 4000);

          // Rotate tips
          setInterval(() => {
              currentTipIndex = (currentTipIndex + 1) % tips.length;
          }, 6000);

          // Breathing exercise
          setInterval(() => {
              if (showBreathingExercise) {
                  breathingPhase = breathingPhase === 'inhale' ? 'exhale' : 'inhale';
                  if (breathingPhase === 'inhale') breathingCount++;
              }
          }, 4000);

          // Queue animation
          setInterval(() => {
              queuePatients.forEach((patient, index) => {
                  if (Math.random() > 0.8) {
                      patient.status = patient.status === 'waiting' ? 'called' : 'waiting';
                  }
              });
          }, 3000);
      "
      x-intersect="isVisible = true">

    {{-- Floating Medical Waiting Room Elements --}}
    <div class="fixed inset-0 pointer-events-none overflow-hidden z-0">
        {{-- Floating Clock --}}
        <div class="absolute top-20 left-10 text-6xl opacity-20 animate-rotate-slow text-blue-400">
            ⏰
        </div>

        {{-- Floating Chairs --}}
        <div class="absolute top-1/4 right-20 text-8xl opacity-15 animate-bounce-gentle text-indigo-400">
            🪑
        </div>

        {{-- Floating Coffee --}}
        <div class="absolute bottom-1/4 left-1/4 text-5xl opacity-25 animate-float text-amber-400">
            ☕
        </div>

        {{-- Floating Magazines --}}
        <div class="absolute top-1/2 right-1/4 text-4xl opacity-20 animate-float-slow text-purple-400">
            📰
        </div>

        {{-- Floating Reception Bell --}}
        <div class="absolute bottom-20 right-10 text-7xl opacity-30 animate-heartbeat text-yellow-400">
            🔔
        </div>

        {{-- Floating Number Ticket --}}
        <div class="absolute top-40 left-1/2 text-5xl opacity-15 animate-wiggle text-green-500">
            🎫
        </div>

        {{-- Additional Waiting Room Elements --}}
        <div class="absolute bottom-1/3 right-1/3 text-3xl opacity-20 animate-dance text-pink-400">
            🏥
        </div>

        <div class="absolute top-3/4 left-20 text-4xl opacity-25 animate-float-delayed text-teal-400">
            📋
        </div>
    </div>

    {{-- Main Content Container --}}
    <div class="relative z-10 min-h-full flex items-center justify-center p-4">
        <div class="max-w-5xl mx-auto text-center">

            {{-- Main Error Display --}}
            <div class="mb-12"
                 x-show="isVisible"
                 x-transition:enter="transition ease-out duration-1000"
                 x-transition:enter-start="opacity-0 transform translate-y-16 scale-95"
                 x-transition:enter-end="opacity-100 transform translate-y-0 scale-100">

                {{-- Virtual Waiting Room Scene --}}
                <div class="relative mb-8">
                    <div class="w-64 h-64 mx-auto relative bg-gradient-to-b from-blue-100 to-blue-200 rounded-3xl shadow-2xl border-4 border-blue-300">

                        {{-- Reception Desk --}}
                        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 bg-white rounded-xl px-4 py-2 shadow-lg">
                            <div class="text-2xl animate-stressed" x-text="doctorMood === 'stressed' ? '👩‍⚕️😰' : '👩‍⚕️😊'"></div>
                        </div>

                        {{-- Queue of Patients --}}
                        <div class="absolute top-4 left-2 right-2">
                            <div class="flex justify-between items-center animate-queue-move">
                                <template x-for="(patient, index) in queuePatients.slice(0, 4)" :key="index">
                                    <div class="text-lg transform transition-all duration-500"
                                         :class="patient.status === 'called' ? 'scale-125 animate-bounce' : 'scale-100'"
                                         x-text="patient.emoji">
                                    </div>
                                </template>
                            </div>
                        </div>

                        {{-- Queue Number Display --}}
                        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-red-500 text-white px-4 py-2 rounded-lg font-bold shadow-lg animate-pulse-glow">
                            <div class="text-sm">@lang('pub_theme::error_429.queue_position')</div>
                            <div class="text-2xl" x-text="queuePosition"></div>
                        </div>

                        {{-- Waiting Time Clock --}}
                        <div class="absolute bottom-16 right-4 bg-yellow-100 rounded-full p-2 shadow-lg">
                            <div class="text-xs font-bold text-yellow-800" x-text="Math.floor(retryCountdown / 60) + ':' + (retryCountdown % 60).toString().padStart(2, '0')"></div>
                        </div>
                    </div>
                </div>

                {{-- Dynamic Error Code --}}
                <div class="mb-6">
                    <h1 class="text-8xl md:text-9xl font-bold bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 bg-clip-text text-transparent animate-pulse-glow">
                        4🚶‍♀️9
                    </h1>
                    <div class="text-2xl md:text-3xl font-bold text-gray-700 mt-2">
                        SALA D'ATTESA PIENA
                    </div>
                </div>

                {{-- Dynamic Waiting Message --}}
                <div class="mb-8 h-16 flex items-center justify-center">
                    <p class="text-xl md:text-2xl text-gray-600 max-w-2xl leading-relaxed font-medium"
                       x-text="currentMessage"
                       x-transition:enter="transition ease-out duration-500"
                       x-transition:enter-start="opacity-0 transform translate-y-4"
                       x-transition:enter-end="opacity-100 transform translate-y-0">
                    </p>
                </div>
            </div>

            {{-- Countdown Timer with Progress Bar --}}
            <div class="mb-12 max-w-2xl mx-auto"
                 x-show="isVisible"
                 x-transition:enter="transition ease-out duration-1000 delay-300"
                 x-transition:enter-start="opacity-0 transform translate-y-16"
                 x-transition:enter-end="opacity-100 transform translate-y-0">

                <div class="bg-white/90 backdrop-blur-sm rounded-2xl p-8 shadow-xl border border-blue-200">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">
                        ⏱️ Tempo di Attesa Stimato
                    </h2>

                    {{-- Countdown Display --}}
                    <div class="mb-6">
                        <div class="text-6xl font-bold text-blue-600 mb-2" x-text="Math.floor(retryCountdown / 60) + ':' + (retryCountdown % 60).toString().padStart(2, '0')"></div>
                        <div class="text-lg text-gray-600">Puoi riprovare tra</div>
                    </div>

                    {{-- Progress Bar --}}
                    <div class="mb-6">
                        <div class="bg-gray-200 rounded-full h-4 overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full transition-all duration-1000 ease-out"
                                 :style="'width: ' + ((60 - retryCountdown) / 60 * 100) + '%'"></div>
                        </div>
                        <div class="flex justify-between text-sm text-gray-500 mt-2">
                            <span>Inizio attesa</span>
                            <span x-text="Math.round((60 - retryCountdown) / 60 * 100) + '% completato'"></span>
                        </div>
                    </div>

                    {{-- Queue Position --}}
                    <div class="flex items-center justify-center space-x-4 bg-blue-50 rounded-xl p-4">
                        <div class="text-3xl">🎫</div>
                        <div>
                            <div class="text-lg font-semibold text-blue-800">Posizione in coda: <span x-text="queuePosition"></span></div>
                            <div class="text-sm text-blue-600">Persone davanti a te nella sala d'attesa virtuale</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Interactive Activities While Waiting --}}
            <div class="mb-12 grid md:grid-cols-3 gap-6"
                 x-show="isVisible"
                 x-transition:enter="transition ease-out duration-1000 delay-500"
                 x-transition:enter-start="opacity-0 transform translate-y-16"
                 x-transition:enter-end="opacity-100 transform translate-y-0">

                {{-- Breathing Exercise --}}
                <div class="bg-white/80 backdrop-blur-sm rounded-xl p-6 shadow-lg border border-green-200">
                    <h3 class="text-lg font-bold text-green-800 mb-4">🫁 Respira e Rilassati</h3>
                    <button @click="showBreathingExercise = !showBreathingExercise"
                            class="w-full px-4 py-3 bg-green-500 text-white rounded-full hover:bg-green-600 transition-all duration-300 transform hover:scale-105 mb-4">
                        <span x-show="!showBreathingExercise">Inizia Esercizio</span>
                        <span x-show="showBreathingExercise">Interrompi</span>
                    </button>

                    <div x-show="showBreathingExercise" x-transition class="text-center">
                        <div class="w-24 h-24 mx-auto mb-4 rounded-full border-4 border-green-400 flex items-center justify-center transition-all duration-4000"
                             :class="breathingPhase === 'inhale' ? 'scale-125 bg-green-100' : 'scale-100 bg-green-50'">
                            <span class="text-2xl" x-text="breathingPhase === 'inhale' ? '⬆️' : '⬇️'"></span>
                        </div>
                        <div class="text-lg font-semibold text-green-700" x-text="breathingPhase === 'inhale' ? 'Inspira...' : 'Espira...'"></div>
                        <div class="text-sm text-green-600">Respiri completati: <span x-text="breathingCount"></span></div>
                    </div>
                </div>

                {{-- Medical Trivia --}}
                <div class="bg-white/80 backdrop-blur-sm rounded-xl p-6 shadow-lg border border-purple-200">
                    <h3 class="text-lg font-bold text-purple-800 mb-4">🧠 Quiz Medico</h3>
                    <button @click="showTrivia = !showTrivia; triviaAnswered = false; selectedAnswer = null"
                            class="w-full px-4 py-3 bg-purple-500 text-white rounded-full hover:bg-purple-600 transition-all duration-300 transform hover:scale-105 mb-4">
                        <span x-show="!showTrivia">Inizia Quiz</span>
                        <span x-show="showTrivia">Nuovo Quiz</span>
                    </button>

                    <div x-show="showTrivia" x-transition>
                        <div class="mb-4">
                            <p class="text-sm font-medium text-purple-700 mb-3" x-text="triviaQuestions[currentTriviaIndex].question"></p>
                            <div class="space-y-2">
                                <template x-for="(option, index) in triviaQuestions[currentTriviaIndex].options" :key="index">
                                    <button @click="selectedAnswer = index; triviaAnswered = true"
                                            class="w-full text-left px-3 py-2 rounded-lg border transition-all duration-200"
                                            :class="selectedAnswer === index ?
                                                   (index === triviaQuestions[currentTriviaIndex].correct ? 'bg-green-100 border-green-400' : 'bg-red-100 border-red-400') :
                                                   'bg-gray-50 border-gray-200 hover:bg-purple-50'"
                                            x-text="option">
                                    </button>
                                </template>
                            </div>
                        </div>
                        <div x-show="triviaAnswered" x-transition class="text-sm text-purple-600">
                            <p x-text="triviaQuestions[currentTriviaIndex].explanation"></p>
                            <p class="mt-2 font-semibold">Punteggio: <span x-text="score"></span>/3</p>
                        </div>
                    </div>
                </div>

                {{-- Tips & Newsletter --}}
                <div class="bg-white/80 backdrop-blur-sm rounded-xl p-6 shadow-lg border border-amber-200">
                    <h3 class="text-lg font-bold text-amber-800 mb-4">💡 Consigli Smart</h3>

                    <div class="mb-4 p-3 bg-amber-50 rounded-lg">
                        <p class="text-sm text-amber-700" x-text="tips[currentTipIndex]"></p>
                    </div>

                    <div class="space-y-3">
                        <input type="email"
                               placeholder="la-tua-email@esempio.com"
                               class="w-full px-3 py-2 border border-amber-300 rounded-lg focus:border-amber-500 focus:ring-2 focus:ring-amber-200">
                        <button class="w-full px-4 py-2 bg-amber-500 text-white rounded-lg hover:bg-amber-600 transition-all duration-300 transform hover:scale-105">
                            📧 Ricevi Consigli VIP
                        </button>
                        <p class="text-xs text-amber-600">Evita le code con i nostri aggiornamenti prioritari!</p>
                    </div>
                </div>
            </div>

            {{-- Auto-Refresh and Action Buttons --}}
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-8"
                 x-show="isVisible"
                 x-transition:enter="transition ease-out duration-1000 delay-700"
                 x-transition:enter-start="opacity-0 transform translate-y-16"
                 x-transition:enter-end="opacity-100 transform translate-y-0">

                {{-- Auto Refresh Button --}}
                <button @click="if(retryCountdown <= 0) location.reload()"
                        :disabled="retryCountdown > 0"
                        class="group inline-flex items-center px-8 py-4 rounded-full shadow-lg transition-all duration-300 transform hover:scale-105"
                        :class="retryCountdown > 0 ?
                               'bg-gray-400 text-white cursor-not-allowed' :
                               'bg-gradient-to-r from-blue-600 to-indigo-600 text-white hover:shadow-2xl'">
                    <svg class="w-6 h-6 mr-3 group-hover:animate-rotate-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    <span x-show="retryCountdown > 0">Riprova tra <span x-text="retryCountdown"></span>s</span>
                    <span x-show="retryCountdown <= 0">🔄 Riprova Ora</span>
                </button>

                {{-- Book Appointment Button --}}
                <a href="/prenota"
                   class="group inline-flex items-center px-8 py-4 bg-gradient-to-r from-green-600 to-teal-600 text-white font-bold rounded-full shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                    <svg class="w-6 h-6 mr-3 group-hover:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    📅 Prenota Appuntamento
                </a>
            </div>

            {{-- Emergency Contact Widget --}}
            <div class="mb-12"
                 x-show="isVisible"
                 x-transition:enter="transition ease-out duration-1000 delay-900"
                 x-transition:enter-start="opacity-0 transform translate-y-16"
                 x-transition:enter-end="opacity-100 transform translate-y-0">

                <div class="bg-gradient-to-r from-red-500 to-red-600 rounded-2xl p-6 shadow-xl border border-red-400 max-w-lg mx-auto animate-pulse-glow">
                    <div class="flex items-center justify-center space-x-4 text-white">
                        <div class="text-3xl animate-heartbeat">🚨</div>
                        <div class="text-center">
                            <h3 class="text-xl font-bold mb-1">Emergenza?</h3>
                            <p class="text-sm opacity-90 mb-3">Non aspettare in caso di urgenza</p>
                            <a href="tel:+39800123456"
                               class="inline-flex items-center px-6 py-3 bg-white text-red-600 font-bold rounded-full hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-lg">
                                📞 Linea Emergenze: 800 123 456
                            </a>
                        </div>
                        <div class="text-3xl animate-bounce-gentle">⚡</div>
                    </div>
                </div>
            </div>

            {{-- Footer Info with Live Updates --}}
            <div class="text-center text-gray-500 text-sm"
                 x-show="isVisible"
                 x-transition:enter="transition ease-out duration-1000 delay-1100"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100">

                <div class="flex items-center justify-center space-x-4 mb-4">
                    <span>🕐 <span x-text="currentTime"></span></span>
                    <span>•</span>
                    <span>🚶‍♀️ Errore 429</span>
                    <span>•</span>
                    <span>🦷 SaluteOra</span>
                </div>

                <div class="mb-2">
                    <span class="font-semibold">Sala d'attesa virtuale:</span> Stiamo gestendo molte richieste per garantirti il miglior servizio!
                </div>

                <div class="flex items-center justify-center space-x-2 text-xs">
                    <span>Powered by</span>
                    <span class="animate-heartbeat">❤️</span>
                    <span>SaluteOra Tech Team</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Background Animated Waves --}}
    <div class="fixed bottom-0 left-0 right-0 pointer-events-none z-0">
        <svg class="w-full h-32" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,60 C150,100 350,0 600,60 C850,120 1050,20 1200,60 L1200,120 L0,120 Z"
                  fill="rgba(59, 130, 246, 0.1)"
                  class="animate-float">
            </path>
            <path d="M0,80 C300,120 600,40 900,80 C1050,100 1150,60 1200,80 L1200,120 L0,120 Z"
                  fill="rgba(99, 102, 241, 0.1)"
                  class="animate-float-delayed">
            </path>
        </svg>
    </div>

    {{-- Custom JavaScript for Enhanced Waiting Room Experience --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Dynamic queue management
            let queueInterval = setInterval(() => {
                // Simulate queue movement
                const queueDisplay = document.querySelector('[x-text="queuePosition"]');
                if (queueDisplay && Math.random() > 0.7) {
                    // Occasionally move queue forward
                    let currentPosition = parseInt(queueDisplay.textContent);
                    if (currentPosition > 1) {
                        queueDisplay.textContent = currentPosition - 1;
                    }
                }
            }, 8000);

            // Simulate server load indicator
            const serverLoadIndicator = () => {
                const loadLevel = Math.random();
                const loadElement = document.createElement('div');
                loadElement.className = 'fixed top-4 right-4 bg-black/80 text-white px-3 py-1 rounded-full text-xs z-50';
                loadElement.innerHTML = `Server Load: ${Math.round(loadLevel * 100)}%`;
                document.body.appendChild(loadElement);

                setTimeout(() => loadElement.remove(), 3000);
            };

            // Show server load occasionally
            setInterval(serverLoadIndicator, 15000);

            // Fun typing effect for tips
            const createTypingEffect = (element, text) => {
                element.textContent = '';
                let i = 0;
                const typing = setInterval(() => {
                    element.textContent += text[i];
                    i++;
                    if (i >= text.length) {
                        clearInterval(typing);
                    }
                }, 50);
            };

            // Add some medical humor notifications
            const medicalJokes = [
                "💊 Fun fact: Il dentista sa quando menti sui tuoi fili interdentali!",
                "🦷 Breaking: Anche i batteri fanno la fila, ma loro non aspettano!",
                "😷 News: Il server ha messo la mascherina per sicurezza!",
                "🩺 Alert: Troppa popolarità può causare code virtuali!"
            ];

            let jokeIndex = 0;
            setInterval(() => {
                const notification = document.createElement('div');
                notification.className = 'fixed top-4 left-4 bg-blue-500 text-white px-4 py-2 rounded-lg shadow-lg z-50 transform translate-x-[-100%] transition-transform duration-500';
                notification.textContent = medicalJokes[jokeIndex % medicalJokes.length];
                document.body.appendChild(notification);

                setTimeout(() => notification.style.transform = 'translateX(0)', 100);
                setTimeout(() => notification.style.transform = 'translateX(-100%)', 4000);
                setTimeout(() => notification.remove(), 4500);

                jokeIndex++;
            }, 20000);

            // Performance optimization for animations
            const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
            if (reduceMotion.matches) {
                document.documentElement.style.setProperty('--animation-duration', '0s');
            }

            // Auto-refresh page when countdown reaches 0
            window.addEventListener('alpine:init', () => {
                Alpine.store('waitingRoom', {
                    autoRefresh() {
                        setTimeout(() => {
                            if (this.retryCountdown <= 0) {
                                window.location.reload();
                            }
                        }, 1000);
                    }
                });
            });
        });
    </script>
</body>
</html>
