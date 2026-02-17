import sys
import json
import re
import pdfplumber
from langchain_core.prompts import ChatPromptTemplate, MessagesPlaceholder


def extract_text(pdf_path: str) -> str:
    """Extrait tout le texte du PDF page par page."""
    text = ""
    with pdfplumber.open(pdf_path) as pdf:
        for page in pdf.pages:
            page_text = page.extract_text()
            if page_text:
                text += page_text + "\n"
    return text.strip()


def extract_info(text: str) -> dict:
    """Extrait les infos structurées depuis le texte brut."""
    # Email
    email_match = re.search(r'[\w.+-]+@[\w-]+\.[\w.-]+', text)
    email = email_match.group(0) if email_match else None

    # Téléphone (formats internationaux et locaux)
    phone_match = re.search(r'(\+?\d[\d\s\-().]{7,}\d)', text)
    phone = phone_match.group(0).strip() if phone_match else None

    return {
        "email": email,
        "phone": phone,
        "raw_text": text,
    }


def main():
    if len(sys.argv) < 2:
        print(json.dumps({"error": "Usage: python extract_info_spontaneaous_cv.py <pdf_path>"}))
        sys.exit(1)

    pdf_path = sys.argv[1]

    try:
        text = extract_text(pdf_path)
        if not text:
            print(json.dumps({"error": "Aucun texte extrait du PDF"}))
            sys.exit(1)

        info = extract_info(text)
        print(json.dumps(info, ensure_ascii=False))

    except Exception as e:
        print(json.dumps({"error": str(e)}))
        sys.exit(1)


if __name__ == "__main__":
    main()
