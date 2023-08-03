from flask import Flask, request, jsonify
from symspellpy import SymSpell, Verbosity

# initialize
sym_spell = SymSpell()
path_corpus = "./corpus/modified.txt"
sym_spell.create_dictionary(path_corpus, encoding="UTF-8")

# Create a Flask app
app = Flask(__name__)

# Define a route for the root URL
@app.route('/')
def index():
    return jsonify({'message': 'Welcome to the Simple Flask API!'})

@app.route('/typo', methods=['GET'])
def typo():
    text = request.args.get('text')
    if text is not None:
        # Process the parameters as needed
        res = []
        for word in text.split(' '):
            suggestions = sym_spell.lookup(word, 
                                        Verbosity.CLOSEST, 
                                        max_edit_distance=2,
                                        include_unknown=True,
                                        ignore_token=r'(?i)artree')
            res.append(suggestions[0].term)
        result = {
            'text': ' '.join(res),
        }
        return jsonify(result)
    else:
        return jsonify({'error': 'Missing parameters. Please provide text.'}), 400

# Run the app if this file is executed
if __name__ == '__main__':
    app.run(debug=False)