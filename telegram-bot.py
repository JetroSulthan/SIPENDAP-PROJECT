from telebot import TeleBot, types

# Replace with your actual bot token
bot_token = "6750609219:AAFbaG0pzoOYqfjMsx_t8jpswm5DlgYrln4"

bot = TeleBot(bot_token)

@bot.message_handler(commands=['start'])
def start(message):
    send_welcome(message)

def send_welcome(message):
    # Welcome message with buttons using inline keyboard
    keyboard = types.InlineKeyboardMarkup()
    button_a = types.InlineKeyboardButton(text="A: Apa itu SIPENDAP", callback_data='apa_sipendap')
    button_b = types.InlineKeyboardButton(text="B: Apa itu SIPENDAP ASSIST", callback_data='apa_assist')
    keyboard.add(button_a, button_b)
    bot.send_message(message.chat.id, "Halo, Selamat datang ke SIPENDAP ASSIST, silahkan pilih list command ini untuk bertanya ya!", reply_markup=keyboard)

@bot.message_handler(func=lambda message: True)
def handle_all_messages(message):
    # Automatically greet the user and show command options
    bot.send_message(message.chat.id, "Halo selamat datang di SIPENDAP ASSIST, ada yang bisa saya bantu? ☺ ")
    send_welcome(message)

@bot.callback_query_handler(func=lambda call: True)
def handle_callback(call):
    if call.data == 'apa_sipendap': 
        bot.send_message(call.message.chat.id, "SIPENDAP adalah Sistem Distribusi Pupuk Subsidi!")  # Replace with actual explanation
    elif call.data == 'apa_assist':
        bot.send_message(call.message.chat.id, "SIPENDAP ASSIST adalah sebuah sistem kecerdasan buatan yang membantu pengguna menggunakan SIPENDAP !")  # Replace with actual explanation
    else:
        bot.send_message(call.message.chat.id, "Pilihan tidak dikenali.")

if __name__ == "__main__":
    bot.polling()