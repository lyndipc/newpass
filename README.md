
# Newpass Password Generator

Newpass is a simple and secure command-line tool that allows you to generate strong and random passwords with customizable options. With this tool, you can create unique passwords for your various accounts and services, ensuring better security for your online presence.

***

## Features

- Control the length of the generated password.
- Choose whether to include uppercase letters, lowercase letters, numbers, and special - characters.
- Copy the generated password directly to your clipboard for easy use.
- No internet connection required; all processing is done locally on your machine.

## Installation

Ensure you have [PHP](https://www.php.net/downloads.php) installed on your machine. Then, run the following command in your terminal:

```bash
composer global require lyndipc/newpass
```

## Usage

To generate a new password, run the following command in your terminal:

```bash
newpass [options]
```

- -l, --lowercase: Include lowercase letters in the password.
- -u, --uppercase: Include uppercase letters in the password.
- -s, --symbols: Include symbols in the password.
- -n, --numbers: Include numbers in the password.
- -t, --length <int>: Specify the length of the password (default: 28 characters).

### Example Usage

1. Generate a 16-character random password with uppercase letters, lowercase letters, numbers, and symbols:

```bash
newpass -t 16 -u -l -n -s
```

2. Generate a 12-character random password with only uppercase letters and numbers:

```bash
newpass -t 12 -u -n
```

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.

## Contribution

Contributions to this project are welcome! If you find a bug or would like to request a new feature, please open an issue or submit a pull request.

***
