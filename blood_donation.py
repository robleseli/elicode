def get_blood_type_info(blood_type):
    blood_types = {
        "O-": {"can_receive": ["O-"], "can_donate_to": ["O+", "O-", "A+", "A-", "B+", "B-", "AB+", "AB-"]},
        "O+": {"can_receive": ["O+", "O-"], "can_donate_to": ["O+", "A+", "B+", "AB+"]},
        "A-": {"can_receive": ["A-", "O-"], "can_donate_to": ["A+", "AB+"]},
        "A+": {"can_receive": ["A+", "A-", "O+", "O-"], "can_donate_to": ["A+", "AB+"]},
        "B-": {"can_receive": ["B-", "O-"], "can_donate_to": ["B+", "AB+"]},
        "B+": {"can_receive": ["B+", "B-", "O+", "O-"], "can_donate_to": ["B+", "AB+"]},
        "AB-": {"can_receive": ["AB-", "A-", "B-", "O-"], "can_donate_to": ["AB+"]},
        "AB+": {"can_receive": ["AB+", "AB-", "A+", "A-", "B+", "B-", "O+", "O-"], "can_donate_to": ["AB+"]},
    }

    return blood_types.get(blood_type.upper(), None)


def main():
    user_blood_type = input("Enter your blood type (e.g., O+, AB-, A-): ")

    blood_info = get_blood_type_info(user_blood_type)
    if blood_info:
        can_receive = ", ".join(blood_info["can_receive"])
        can_donate_to = ", ".join(blood_info["can_donate_to"])
        print(f"Blood type {user_blood_type.upper()}:")
        print(f"You can receive blood from: {can_receive}")
        print(f"You can donate blood to: {can_donate_to}")
    else:
        print("Invalid blood type. Please enter a valid blood type (e.g., O+, AB-, A-)")

if __name__ == "__main__":
    main()
