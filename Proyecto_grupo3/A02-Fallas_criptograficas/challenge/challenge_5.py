# Cadena de caracteres con el mensaje oculto
hidden_message = '9a8b7c6d5e4f3g2h1iCTF{p4ttern_rec0gniti0n_1s_k3y}'

# Función para extraer la bandera del mensaje oculto
def extract_flag(hidden_message):
    # Buscamos el inicio de la bandera por el formato típico 'CTF{'
    start_index = hidden_message.find('CTF{')
    # Asumimos que la bandera termina con '}'
    end_index = hidden_message.find('}', start_index) + 1
    return hidden_message[start_index:end_index]

# Esta es la función principal que ejecuta el desafío
def main():
    print("Bienvenido al desafío del Misterio del Mensaje Oculto.")

    # Extraemos la bandera
    flag = extract_flag(hidden_message)

    print("La bandera es:", flag)

if __name__ == "__main__":
    main()

# without string base64

#import base64
#
## Cadena codificada que contiene la bandera
#encoded_flag = base64.b64encode(b'CTF{p4ttern_rec0gniti0n_1s_k3y}').decode('utf-8')
#
## Función para decodificar la bandera
#def decode_flag(encoded_flag):
#    decoded_bytes = base64.b64decode(encoded_flag)
#    return decoded_bytes.decode('utf-8')
#
## Esta es la función principal que ejecuta el desafío
#def main():
#    print("Bienvenido al desafío del Misterio del Mensaje Oculto.")
#
#    # Decodificamos la bandera
#    flag = decode_flag(encoded_flag)
#
#    print("La bandera es:", flag)
#
#if __name__ == "__main__":
#    main()
