<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Verification</title>
</head>

<body>

    <div class="flex justify-center items-center h-screen ">
        <div class="max-w-md mx-auto text-center bg-white px-4 sm:px-8 py-10 rounded-xl shadow">
            <header class="mb-8">
                <h1 class="text-2xl font-bold mb-1">Gmail Verification</h1>
                <p class="text-[15px] text-slate-500">Enter the 4-digit verification code that was sent to your Gmail
                    account.
                </p>
            </header>
            <form id="otp-form" action="{{ route('verify.email.post') }}" method="POST">
                @csrf

                <div class="flex items-center justify-center gap-3">
                    <input type="text" name="otp[]"
                        class="otp-input w-14 h-14 text-center text-2xl font-extrabold text-slate-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded p-4 outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                        pattern="\d*" maxlength="1" />
                    <input type="text" name="otp[]"
                        class="otp-input w-14 h-14 text-center text-2xl font-extrabold text-slate-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded p-4 outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                        maxlength="1" />
                    <input type="text" name="otp[]"
                        class="otp-input w-14 h-14 text-center text-2xl font-extrabold text-slate-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded p-4 outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                        maxlength="1" />
                    <input type="text" name="otp[]"
                        class="otp-input w-14 h-14 text-center text-2xl font-extrabold text-slate-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded p-4 outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                        maxlength="1" />
                </div>
                <div class="max-w-[260px] mx-auto mt-4">
                    <button type="submit"
                        class="w-full inline-flex justify-center whitespace-nowrap rounded-lg bg-gray-800 hover:bg-gray-900 px-3.5 py-2.5 text-sm font-medium text-white shadow-sm shadow-indigo-950/10 focus:outline-none focus:ring focus:ring-indigo-300 focus-visible:outline-none focus-visible:ring focus-visible:ring-indigo-300 transition-colors duration-150">Verify
                        Account</button>
                </div>
            </form>
            <div class="text-sm text-slate-500 mt-4">Didn't receive code? <a
                    class="font-medium text-slate-800 hover:text-slate-900" href="#0">Resend</a></div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('otp-form')
            const inputs = [...form.querySelectorAll('input[type=text]')]
            const submit = form.querySelector('button[type=submit]')

            const handleKeyDown = (e) => {
                if (
                    !/^[0-9]{1}$/.test(e.key) &&
                    e.key !== 'Backspace' &&
                    e.key !== 'Delete' &&
                    e.key !== 'Tab' &&
                    !e.metaKey
                ) {
                    e.preventDefault()
                }

                if (e.key === 'Delete' || e.key === 'Backspace') {
                    const index = inputs.indexOf(e.target);
                    if (index > 0) {
                        inputs[index - 1].value = '';
                        inputs[index - 1].focus();
                    }
                }
            }

            const handleInput = (e) => {
                const {
                    target
                } = e
                const index = inputs.indexOf(target)
                if (target.value) {
                    if (index < inputs.length - 1) {
                        inputs[index + 1].focus()
                    } else {
                        submit.focus()
                    }
                }
            }

            const handleFocus = (e) => {
                e.target.select()
            }

            const handlePaste = (e) => {
                e.preventDefault()
                const text = e.clipboardData.getData('text')
                if (!new RegExp(`^[0-9]{${inputs.length}}$`).test(text)) {
                    return
                }
                const digits = text.split('')
                inputs.forEach((input, index) => input.value = digits[index])
                submit.focus()
            }

            inputs.forEach((input) => {
                input.addEventListener('input', handleInput)
                input.addEventListener('keydown', handleKeyDown)
                input.addEventListener('focus', handleFocus)
                input.addEventListener('paste', handlePaste)
            })
        })
    </script>
</body>

</html>