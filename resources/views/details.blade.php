@extends('layouts.app')

@section('content')

    <x-chaos-loader />

    <div class="min-h-screen flex items-center justify-center px-6">

        <!-- Step 1 -->
        <div id="step1" class="glow-card w-full max-w-xl p-8">

            <h2 class="text-3xl font-bold mb-6 text-center">ENTER THE CHAOS</h2>

            <form id="usernameForm">

                <label class="block mb-2">
                    YOUR X USERNAME (MUST START WITH @):
                </label>

                <input id="username" type="text" placeholder="@xusername" class="input-chaos mb-6">

                <label class="block mb-2">
                    WHO INVITED YOU? (OPTIONAL):
                </label>

                <input id="referrer" type="text" placeholder="@friend" class="input-chaos mb-6">

                <button type="submit" class="btn-glitch w-full">
                    GET REKT
                </button>

            </form>

        </div>

        <!-- Step 2 -->
        <div id="step2" class="hidden glow-card w-full max-w-xl p-8">

            <h2 class="text-2xl mb-6 text-center">
                COMPLETE THESE TO GET REKT
            </h2>

            <div class="space-y-6">

                <div class="flex justify-between items-center">
                    <span>FOLLOW @rektbabies AND TURN ON NOTIS</span>
                    <a href="https://x.com/rektbabies" target="_blank" class="btn-glitch">Follow</a>
                </div>

                <div class="flex justify-between items-center">
                    <span>LIKE THIS POST</span>
                    <a href="https://x.com/ConnCFC/status/2023347612532068499" target="_blank" class="btn-glitch">Like</a>
                </div>

                <div class="flex justify-between items-center">
                    <span>RETWEET THIS POST</span>
                    <a href="https://twitter.com/intent/tweet?url=https://x.com/ConnCFC/status/2023347612532068499"
                        target="_blank" class="btn-glitch">
                        RT
                    </a>
                </div>

                <div>
                    <label>Proof of Rekt Behavior</label>
                    <input id="retweetProof" placeholder="paste your retweet link" class="input-chaos">
                </div>

                <div>
                    <label>Tag two frens who might get REKT</label>
                    <input id="commentProof" placeholder="paste your comment link" class="input-chaos">
                </div>

                <button id="proceedBtn" class="btn-glitch w-full">
                    PROCEED
                </button>

                <button type="button" id="backToStep1" class="mt-3">
                    ← BACK
                </button>




            </div>
        </div>

        <!-- Step 3 -->
        <div id="step3" class="hidden glow-card w-full max-w-xl p-8">

            <h2 class="text-2xl mb-6 text-center">
                SUBMIT EVM WALLET
            </h2>

            <form id="walletForm">
                <label>Enter valid EVM address</label>

                <input id="walletInput" placeholder="0x1234abcd5678ef901234abcd5678ef901234abcd" class="input-chaos mb-4">

                <div id="walletError" class="text-red-500 mb-4"></div>

                <button type="submit" class="btn-glitch w-full">
                    FINALIZE REKT
                </button>
                <button type="button" id="backToStep2" class="mt-3">
                    ← BACK
                </button>


            </form>


        </div>

    </div>


    @if(session('referral'))

        <div class="mt-20 text-center">

            <div class="glow-card inline-block p-8">

                <h3 class="mb-4 text-xl">YOUR REFERRAL LINK</h3>

                <div id="refLink" class="mb-4">
                    {{ session('referral') }}
                </div>

                <button onclick="copyLink()" class="btn-glitch">
                    COPY LINK
                </button>

                <p class="mt-4 text-green-300">
                    SHARE LINK FOR HIGHER REVIEW CHANCE<br>
                    STAY TUNED FOR UPDATES
                </p>

                <div class="mt-6">
                    <a href="{{ url('/') }}" class="btn-glitch">HOME</a>
                </div>

            </div>

        </div>

    @endif


    <style>
        .glow-card {
            background: rgba(0, 0, 0, 0.7);
            border: 2px solid #00ff80;
            border-radius: 20px;
            box-shadow: 0 0 25px rgba(0, 255, 128, 0.4);
        }

        .input-chaos {
            width: 100%;
            padding: 12px;
            background: black;
            border: 1px solid #00ff80;
            color: #00ff80;
            border-radius: 8px;
        }

        .btn-glitch {
            padding: 10px 20px;
            background: #00ff80;
            color: black;
            font-weight: bold;
            border-radius: 8px;
            transition: 0.3s;
        }

        .btn-glitch:hover {
            transform: scale(1.05);
        }
    </style>

    <script>
        let storedUsername = '';
        let storedReferrer = '';

        const loader = document.getElementById('chaosLoader');

        function showLoader(next) {
            loader.classList.remove('hidden');
            setTimeout(() => {
                loader.classList.add('hidden');
                next();
            }, 1500);
        }

        /* STEP 1 */
        document.getElementById('usernameForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const username = document.getElementById('username').value.trim();
            const referrer = document.getElementById('referrer').value.trim();

            if (!/^@[A-Za-z0-9_]+$/.test(username)) {
                alert('Invalid X username');
                return;
            }

            storedUsername = username;
            storedReferrer = referrer;

            showLoader(() => {
                document.getElementById('step1').classList.add('hidden');
                document.getElementById('step2').classList.remove('hidden');
            });
        });

        /* STEP 2 */
        document.getElementById('proceedBtn').addEventListener('click', function () {

            const proof1 = document.getElementById('retweetProof').value.trim();
            const proof2 = document.getElementById('commentProof').value.trim();

            if (
                proof1 === '' ||
                proof2 === ''
            ) {
                alert('Links must be valid x.com URLs');
                return;
            }


            showLoader(() => {
                document.getElementById('step2').classList.add('hidden');
                document.getElementById('step3').classList.remove('hidden');
            });
        });

        /* STEP 3 FINAL SUBMIT */
        document.getElementById('walletForm').addEventListener('submit', async function (e) {
            e.preventDefault();

            const wallet = document.getElementById('walletInput').value.trim();
            const proof1 = document.getElementById('retweetProof').value.trim();
            const proof2 = document.getElementById('commentProof').value.trim();

            try {

                const response = await fetch('/ajax/register', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        x_username: storedUsername,
                        referrer: storedReferrer,
                        wallet: wallet,
                        retweet_proof: proof1,
                        comment_proof: proof2
                    })
                });

                const data = await response.json();

                if (!response.ok) {

                    if (typeof data.error === 'object') {
                        const firstError = Object.values(data.error)[0][0];
                        document.getElementById('walletError').innerText = firstError;
                    } else {
                        document.getElementById('walletError').innerText = data.error;
                    }

                    return;
                }

                showLoader(() => {

                    document.getElementById('step3').innerHTML = `
                                    <div class="text-center">
                                        <h3 class="text-xl mb-4">YOUR REFERRAL LINK</h3>

                                        <div id="refLink" class="mb-4">${data.referral_link}</div>

                                        <button onclick="copyLink()" class="btn-glitch">
                                            COPY LINK
                                        </button>

                                        <p class="mt-4 text-green-300">
                                            SHARE LINK FOR HIGHER REVIEW CHANCE<br>
                                            STAY TUNED FOR UPDATES
                                        </p>

                                        <div class="mt-6">
                                            <a href="/" class="btn-glitch">HOME</a>
                                        </div>
                                    </div>
                                `;
                });

            } catch (error) {
                document.getElementById('walletError').innerText = 'Server error. Try again.';
            }
        });


        /* COPY */
        function copyLink() {
            const text = document.getElementById('refLink').innerText;
            navigator.clipboard.writeText(text);
            showGlitchToast();
        }

        /* GLITCH POPUP */
        function showGlitchToast() {
            const toast = document.createElement('div');
            toast.innerText = 'LINK COPIED';
            toast.className = 'fixed top-10 right-10 bg-black border border-green-400 px-6 py-3 text-green-400 animate-pulse';
            document.body.appendChild(toast);

            setTimeout(() => toast.remove(), 2000);
        }

        const step1 = document.getElementById('step1');
        const step2 = document.getElementById('step2');
        const step3 = document.getElementById('step3');

        function goToStep(step) {
            step1.classList.add('hidden');
            step2.classList.add('hidden');
            step3.classList.add('hidden');

            document.getElementById('step' + step).classList.remove('hidden');
            window.scrollTo({ top: 0, behavior: 'smooth' });

        }

        document.getElementById('backToStep1').addEventListener('click', function () {
            goToStep(1);
        });

        document.getElementById('backToStep2').addEventListener('click', function () {
            goToStep(2);
        });

    </script>


@endsection