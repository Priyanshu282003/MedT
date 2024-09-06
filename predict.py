from flask import Flask, request, jsonify
import h2o

app = Flask(__name__)

# Load the H2O.ai model
model_path = 'path_to_your_mojo_model.mojo'
model = h2o.mojo_predictor.MojoModel(model_path)

@app.route('/predict', methods=['POST'])
def predict():
    data = request.json  # Assuming JSON data is sent
    prediction = model.predict(h2o.H2OFrame(data))
    return jsonify(prediction.as_data_frame().to_dict(orient='records'))

if __name__ == '__main__':
    app.run(debug=True)
