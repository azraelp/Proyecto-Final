import hashlib

# La 'contraseña' es un hash MD5 de una palabra real.
# Para el desafío, se debe encontrar la palabra original cuyo hash MD5 es este.
password_hash = '5f4dcc3b5aa765d61d8327deb882cf99'

# Función para verificar si la entrada del usuario es correcta
def verify_password(user_input):
    # Calculamos el hash MD5 de la entrada del usuario
    user_input_hash = hashlib.md5(user_input.encode()).hexdigest()

    # Comparamos el hash de la entrada con el hash de la contraseña
    if user_input_hash == password_hash:
        return True
    else:
        return False

# Esta es la función principal que ejecuta el desafío
def main():
    print("Bienvenido al desafío de Falla de Hash Inseguro.")
    user_input = input("Introduce la palabra cuya hash MD5 es '5f4dcc3b5aa765d61d8327deb882cf99': ")

    if verify_password(user_input):
        print("¡Correcto! Aquí está tu bandera: FLAG{hash_collision}")
    else:
        print("Incorrecto. Intenta de nuevo.")

if __name__ == "__main__":
    main()
