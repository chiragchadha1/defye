<?

error_reporting(E_ALL);
ini_set('ignore_repeated_errors', TRUE);
ini_set('log_errors', TRUE);
ini_set('error_log', 'webhook_errors_strp.txt');

$directoryPath = explode("public_html", getcwd())[0]."public_html";

require_once($directoryPath.'/Stripe/init.php');

function getNewTimestamp(){
    return date("m-d-Y")." @ ".date("h:i A");
}

$webhookurl = "https://discordapp.com/api/webhooks/671098756300668961/LYRS3oZapYynmctm2_-KouxJ-k3MIG-md6BXQql33ifoITp8Pw5CT3OHvH0UuZSxafeg";

function sendMessageToDiscord($url, $json){
    $ch = curl_init( $url );
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
    curl_setopt( $ch, CURLOPT_POST, 1);
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt( $ch, CURLOPT_HEADER, 0);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
    return curl_exec( $ch );
}

$endpoint_secret = "whsec_oAvl6AAjvWA5T6KQqEppOHzAtcenqPg4"; // Change This To Webhook Secret

function processPaymentIntent($data, $url){
    // https://discohook.jaylineko.com/?backup=eyJtZXNzYWdlIjp7ImVtYmVkcyI6W3sidGl0bGUiOiJQYXltZW50IEFsZXJ0IHwgU3RyaXBlIiwidXJsIjoiaHR0cHM6Ly9kaXNjb3JkYXBwLmNvbS8iLCJkZXNjcmlwdGlvbiI6IkEgUGF5bWVudCBoYXMgYmVlbiByZWNlaXZlZCBmcm9tIEpvaG4gRG9lLiIsImZpZWxkcyI6W3sibmFtZSI6IkFtb3VudCIsInZhbHVlIjoiYGBgJDc1LjAwL21vYGBgIn0seyJuYW1lIjoiRW1haWwiLCJ2YWx1ZSI6ImBgYGxvbHhkMTIzQGdtYWlsLmNvbWBgYCJ9LHsibmFtZSI6IlBheW1lbnQgSUQiLCJ2YWx1ZSI6ImBgYHBpXzFHNTFrd0dQZ2tHQ2djZ0tKS3NXbVJLdWBgYCJ9LHsibmFtZSI6IlBheW1lbnQgVHlwZSIsInZhbHVlIjoiT25lLVRpbWUiLCJpbmxpbmUiOnRydWV9LHsibmFtZSI6IlJpc2sgTGV2ZWwiLCJ2YWx1ZSI6Im5vcm1hbCIsImlubGluZSI6dHJ1ZX0seyJpbmxpbmUiOnRydWUsIm5hbWUiOiJQYXltZW50IFJlY2llcHQiLCJ2YWx1ZSI6IioqW1tSZWNpZXB0XV0oaHR0cHM6Ly9nb29nbGUuY29tKSoqIn1dLCJmb290ZXIiOnsidGV4dCI6IlNlcnZlciBUaW1lc3RhbXA6IDAxLTI1LTIwMjAgQCAwNjoyMCBQTSIsImljb25VcmwiOiIifSwiY29sb3IiOjEwMTk1OTY3fV0sInVzZXJuYW1lIjoiSGF3ayBSb2JvdGl4IFBheW1lbnQgV2ViaG9vayIsImF2YXRhclVybCI6Imh0dHBzOi8vcGJzLnR3aW1nLmNvbS9wcm9maWxlX2ltYWdlcy8xMjE0MzczMjk5MzgxMjQ4MDAwL3RPSjlZbzl4XzQwMHg0MDAuanBnIn0sImZpbGVzIjpbXX0
    $amount = number_format($data["data"]["object"]["amount"] / 100, 2);
    $email = $data["data"]["object"]["charges"]["data"][0]["receipt_email"];
    $name = $data["data"]["object"]["charges"]["data"][0]["source"]["name"];
    $object = "One-Time";
    $reciept = $data["data"]["object"]["charges"]["data"][0]["receipt_url"];
    $paymentID = $data["data"]["object"]["id"];
    $risk = $data["data"]["object"]["charges"]["data"][0]["outcome"]["risk_level"];
    if(!isset($email) || strlen($email) == 0){
      $email = "NA";
    }
    if(!isset($name) || strlen($name) == 0){
      $name = "NA";
    }
    sendMessageToDiscord($url, '{
        "embeds": [
          {
            "title": "Payment Alert | Stripe",
            "url": "'.$reciept.'",
            "description": "A Payment has been received from '.$name.'.",
            "fields": [
              {
                "name": "Amount",
                "value": "```$'.$amount.'```"
              },
              {
                "name": "Email",
                "value": "```'.$email.'```"
              },
              {
                "name": "Payment ID",
                "value": "```'.$paymentID.'```"
              },
              {
                "name": "Payment Type",
                "value": "'.$object.'",
                "inline": true
              },
              {
                "name": "Risk Level",
                "value": "'.$risk.'",
                "inline": true
              },
              {
                "inline": true,
                "name": "Payment Reciept",
                "value": "**[[Reciept]]('.$reciept.')**"
              }
            ],
            "footer": {
              "text": "Server Timestamp: '.getNewTimestamp().'",
              "icon_url": ""
            },
            "color": 10195967
          }
        ],
        "username": "Hawk Robotix Payment Webhook",
        "avatar_url": "https://pbs.twimg.com/profile_images/1214373299381248000/tOJ9Yo9x_400x400.jpg"
      }');
      echo "A Payment Intent webhook has been sent to Hawk Robotix Webhook.";
}

function processSubscription($data, $url){
  $amount = number_format($data["data"]["object"]["plan"]["amount"] / 100, 2);
  $customerID = $data["data"]["object"]["customer"];
  $planName = $data["data"]["object"]["plan"]["nickname"];
  $object = "Subscription";
  $subscriptionURL = "https://dashboard.stripe.com/subscriptions/".$data["data"]["object"]["id"];
  $subscriptionID = $data["data"]["object"]["id"];

  sendMessageToDiscord($url, '{
      "embeds": [
        {
          "title": "Subscription Creation Alert | Stripe",
          "url": "'.$subscriptionURL.'",
          "description": "A subscription has been created for '.$planName.'.",
          "fields": [
            {
              "name": "Amount",
              "value": "```$'.$amount.'```"
            },
            {
              "name": "Payment Type",
              "value": "'.$object.'",
              "inline": true
            },
            {
              "inline": true,
              "name": "Subscription",
              "value": "**[[View]]('.$subscriptionURL.')**"
            }
          ],
          "footer": {
            "text": "Server Timestamp: '.getNewTimestamp().'",
            "icon_url": ""
          },
          "color": 10195967
        }
      ],
      "username": "Hawk Robotix Subscription Webhook",
      "avatar_url": "https://pbs.twimg.com/profile_images/1214373299381248000/tOJ9Yo9x_400x400.jpg"
    }');
    echo "A Subscription alert has been sent to Hawk Robotix Webhook.";
}

$payload = @file_get_contents('php://input');
if(!is_object($payload)){
    $payload = json_decode($payload, true);
}
if(!isset($payload["type"])){
    echo "invalid.\n";
    echo $payload;
    die();
}

if($payload["type"] == "payment_intent.succeeded"){
    processPaymentIntent($payload, $webhookurl);
} else {
    processSubscription($payload, $webhookurl);
}

?>