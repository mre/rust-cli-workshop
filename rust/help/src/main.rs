use std::env;

/// A function for counting the words in a `String`
pub fn count_words(input: String) -> usize {
    input.split_whitespace().count()
}

/// A function to count the number of bytes in a `String`
pub fn count_bytes(input: String) -> usize {
    input.len()
}

/// Count the number of chars in a `String`.
/// Note that this is different from `input.len()` as
/// one character can consist of multiple bytes
pub fn count_chars(input: String) -> usize {
    input.chars().count()
}

fn main() {
		/// Here is how to do argument handling in Rust.
		/// The first argument is the name of the binary, so we skip it.
    for arg in env::args().skip(1) {
        println!("{}", arg);
        println!("{}", count_bytes(arg))
    }
}

#[cfg(test)]
mod test {
    use super::*;

    #[test]
    fn test_count_words() {
        assert_eq!(count_words("Hello world".to_string()), 2);
        assert_eq!(count_words("Hello terrible world".to_string()), 3);
        assert_eq!(
            count_words("       Spaceeees               ".to_string()),
            1
        );
    }

    #[test]
    fn test_count_bytes() {
        assert_eq!(count_bytes("Hello world".to_string()), 11);
        assert_eq!(count_bytes("Hello terrible world".to_string()), 20);
        assert_eq!(
            count_bytes("她今天看起来很悲伤。".to_string()),
            30
        );
    }

    #[test]
    fn test_count_chars() {
        // Same as count_bytes
        assert_eq!(count_chars("Hello world".to_string()), 11);
        // Different result as count_bytes, because in UTF-8 each character
        // consists of more than a single byte.
        assert_eq!(
            count_chars("她今天看起来很悲伤。".to_string()),
            10
        );
    }
}
