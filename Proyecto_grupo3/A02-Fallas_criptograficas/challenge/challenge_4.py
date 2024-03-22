import base64

# Mensaje codificado en Base64
encoded_message = 'Q1RGe2Jhc2U2NF9kZWNvZGluZ19pc19mdW59'

# Función para decodificar el mensaje
def decode_base64(encoded_message):
    decoded_bytes = base64.b64decode(encoded_message)
    return decoded_bytes.decode('utf-8')

# Esta es la función principal que ejecuta el desafío
def main():
    print("Bienvenido al desafío de Decodificación Secreta de Base64.")
    print("Mensaje codificado en Base64:", encoded_message)

    # Decodificamos el mensaje
    decoded_message = decode_base64(encoded_message)

    print("El mensaje decodificado es:", decoded_message)

if __name__ == "__main__":
    main()

