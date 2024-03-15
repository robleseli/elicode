import javafx.application.Application;
import javafx.geometry.Insets;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import javafx.scene.layout.GridPane;
import javafx.stage.Stage;

public class BloodTypeGUI extends Application {

    private TextField bloodTypeField;
    private Label receiveLabel;
    private Label donateLabel;

    @Override
    public void start(Stage primaryStage) {
        // Create labels and text fields
        Label bloodTypeLabel = new Label("Enter your blood type (e.g., O+, AB-, A-):");
        bloodTypeField = new TextField();
        receiveLabel = new Label();
        donateLabel = new Label();

        // Create get info button
        Button getInfoButton = new Button("Get Blood Type Info");
        getInfoButton.setOnAction(e -> getBloodTypeInfo());

        // Create layout
        GridPane gridPane = new GridPane();
        gridPane.setPadding(new Insets(10));
        gridPane.setVgap(10);
        gridPane.setHgap(10);
        gridPane.addRow(0, bloodTypeLabel, bloodTypeField);
        gridPane.addRow(1, getInfoButton);
        gridPane.addRow(2, new Label("You can receive blood from:"), receiveLabel);
        gridPane.addRow(3, new Label("You can donate blood to:"), donateLabel);

        // Set up scene
        Scene scene = new Scene(gridPane, 400, 200);

        // Set up stage
        primaryStage.setTitle("Blood Type Information");
        primaryStage.setScene(scene);
        primaryStage.show();
    }

    private void getBloodTypeInfo() {
        String userBloodType = bloodTypeField.getText();

        String[] canReceive = getBloodType(userBloodType).get("can_receive");
        String[] canDonateTo = getBloodType(userBloodType).get("can_donate_to");

        receiveLabel.setText(String.join(", ", canReceive));
        donateLabel.setText(String.join(", ", canDonateTo));
    }

    private static java.util.HashMap<String, String[]> getBloodType(String bloodType) {
        java.util.HashMap<String, String[]> bloodTypes = new java.util.HashMap<>();
        bloodTypes.put("O-", new String[]{"O-"});
        bloodTypes.put("O+", new String[]{"O+", "O-"});
        bloodTypes.put("A-", new String[]{"A-", "O-"});
        bloodTypes.put("A+", new String[]{"A+", "A-", "O+", "O-"});
        bloodTypes.put("B-", new String[]{"B-", "O-"});
        bloodTypes.put("B+", new String[]{"B+", "B-", "O+", "O-"});
        bloodTypes.put("AB-", new String[]{"AB-", "A-", "B-", "O-"});
        bloodTypes.put("AB+", new String[]{"AB+", "AB-", "A+", "A-", "B+", "B-", "O+", "O-"});

        return bloodTypes.get(bloodType.toUpperCase());
    }

    public static void main(String[] args) {
        launch(args);
    }
}
