<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

$host = 'localhost';
$dbname = 'growth_partner_db';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo json_encode(['error' => 'Database connection failed: ' . $e->getMessage()]);
    exit;
}

$method = $_SERVER['REQUEST_METHOD'];

switch($method) {
    case 'GET':
        getPrograms($pdo);
        break;
    case 'POST':
        addProgram($pdo);
        break;
    case 'PUT':
        updateProgram($pdo);
        break;
    case 'DELETE':
        deleteProgram($pdo);
        break;
    default:
        echo json_encode(['error' => 'Method not allowed']);
        break;
}

function getPrograms($pdo) {
    try {
        $stmt = $pdo->query("SELECT * FROM growth_programs WHERE is_active = 1 ORDER BY display_order ASC");
        $programs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($programs as &$program) {
            $program['features'] = json_decode($program['features'], true);
        }
        
        echo json_encode(['success' => true, 'data' => $programs]);
    } catch(PDOException $e) {
        echo json_encode(['error' => 'Failed to fetch programs: ' . $e->getMessage()]);
    }
}

function addProgram($pdo) {
    try {
        $data = json_decode(file_get_contents('php://input'), true);
        
        $stmt = $pdo->prepare("
            INSERT INTO growth_programs 
            (tier_name, tier_icon, tier_class, ideal_for, features, outcome, display_order, is_active) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ");
        
        $stmt->execute([
            $data['tier_name'],
            $data['tier_icon'],
            $data['tier_class'],
            $data['ideal_for'],
            json_encode($data['features']),
            $data['outcome'],
            $data['display_order'] ?? 0,
            $data['is_active'] ?? 1
        ]);
        
        echo json_encode(['success' => true, 'message' => 'Program added successfully', 'id' => $pdo->lastInsertId()]);
    } catch(PDOException $e) {
        echo json_encode(['error' => 'Failed to add program: ' . $e->getMessage()]);
    }
}

function updateProgram($pdo) {
    try {
        $data = json_decode(file_get_contents('php://input'), true);
        
        $stmt = $pdo->prepare("
            UPDATE growth_programs 
            SET tier_name = ?, tier_icon = ?, tier_class = ?, ideal_for = ?, 
                features = ?, outcome = ?, display_order = ?, is_active = ?
            WHERE id = ?
        ");
        
        $stmt->execute([
            $data['tier_name'],
            $data['tier_icon'],
            $data['tier_class'],
            $data['ideal_for'],
            json_encode($data['features']),
            $data['outcome'],
            $data['display_order'],
            $data['is_active'],
            $data['id']
        ]);
        
        echo json_encode(['success' => true, 'message' => 'Program updated successfully']);
    } catch(PDOException $e) {
        echo json_encode(['error' => 'Failed to update program: ' . $e->getMessage()]);
    }
}

function deleteProgram($pdo) {
    try {
        $id = $_GET['id'] ?? null;
        
        if (!$id) {
            echo json_encode(['error' => 'Program ID is required']);
            return;
        }
        
        $stmt = $pdo->prepare("UPDATE growth_programs SET is_active = 0 WHERE id = ?");
        $stmt->execute([$id]);
        
        echo json_encode(['success' => true, 'message' => 'Program deleted successfully']);
    } catch(PDOException $e) {
        echo json_encode(['error' => 'Failed to delete program: ' . $e->getMessage()]);
    }
}
?>
