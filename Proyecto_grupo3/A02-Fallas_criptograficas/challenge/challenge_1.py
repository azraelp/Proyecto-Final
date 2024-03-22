from Crypto.Cipher import AES
from secrets import token_bytes

# La clave debería ser secreta, pero para este reto, la definimos estáticamente
key = b'supersecretkey123'

# Función para cifrar el mensaje
def encrypt_message(message):
    cipher = AES.new(key, AES.MODE_ECB)
    # Aseguramos que el mensaje sea un múltiplo del tamaño de bloque de AES (16 bytes)
    padded_message = message + b' ' * (16 - len(message) % 16)
    encrypted_message = cipher.encrypt(padded_message)
    return encrypted_message.hex()

# Mensaje secreto que los participantes deben descifrar
secret_message = b'Felicidades! Has descifrado el mensaje!'

# Ciframos el mensaje y lo mostramos como el desafío
encrypted_secret = encrypt_message(secret_message)
print(f'El mensaje cifrado es: {encrypted_secret}')
