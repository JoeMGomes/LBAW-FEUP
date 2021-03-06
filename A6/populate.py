import random
import string

alphanumericplus = {
    'a', 'A',
    'b', 'B',
    'c', 'C',
    'd', 'D',
    'e', 'E',
    'f', 'F',
    'g', 'G',
    'h', 'H',
    'i', 'I',
    'j', 'J',
    'k', 'K',
    'l', 'L',
    'm', 'M',
    'n', 'N',
    'o', 'O',
    'p', 'P',
    'q', 'Q',
    'r', 'R',
    's', 'S',
    't', 'T',
    'u', 'U',
    'v', 'V',
    'w', 'W',
    'x', 'X',
    'y', 'Y',
    'z', 'Z',
    '0',
    '1', 
    '2', 
    '3', 
    '4', 
    '5', 
    '6', 
    '7', 
    '8', 
    '9',
    '.', '-', '_', 
}

alphalower = {
    'a',
    'b',
    'c',
    'd',
    'e',
    'f',
    'g',
    'h',
    'i',
    'j',
    'k',
    'l',
    'm',
    'n',
    'o',
    'p',
    'q',
    'r',
    's',
    't',
    'u',
    'v',
    'w',
    'x',
    'y',
    'z'
}

firstName = {
    'Liam', 
    'Noah', 
    'William', 
    'James', 
    'Oliver', 
    'Benjamin', 
    'Elijah', 
    'Lucas', 
    'Mason', 
    'Logan', 
    'Alexander', 
    'Ethan', 
    'Jacob', 
    'Michael', 
    'Daniel', 
    'Henry', 
    'Jackson', 
    'Sebastian', 
    'Aiden', 
    'Matthew', 
    'Samuel', 
    'David', 
    'Joseph', 
    'Carter', 
    'Owen', 
    'Wyatt', 
    'John', 
    'Jack', 
    'Luke', 
    'Jayden', 
    'Dylan', 
    'Grayson', 
    'Levi', 
    'Isaac', 
    'Gabriel', 
    'Julian', 
    'Mateo', 
    'Anthony', 
    'Jaxon', 
    'Lincoln', 
    'Joshua', 
    'Christopher', 
    'Andrew', 
    'Theodore', 
    'Caleb', 
    'Ryan', 
    'Asher', 
    'Nathan', 
    'Thomas', 
    'Leo', 
}

lastName = {
    'Smith',
    'Johnson',
    'Williams',  
    'Jones',  
    'Brown',  
    'Davis',  
    'Miller',  
    'Wilson',  
    'Moore',  
    'Taylor',  
    'Anderson',  
    'Thomas',  
    'Jackson',  
    'White',  
    'Harris',  
    'Martin',  
    'Thompson',  
    'Garcia',  
    'Martinez',  
    'Robinson',  
    'Clark',  
    'Rodriguez',  
    'Lewis',  
    'Lee',  
    'Walker',  
    'Hall',  
    'Allen',  
    'Young',  
    'Hernandez',  
    'King',  
    'Wright',  
    'Lopez',  
    'Hill',  
    'Scott',  
    'Green',  
    'Adams',  
    'Baker',  
    'Gonzalez',  
    'Nelson',  
    'Carter',  
    'Mitchell', 
    'Perez',  
    'Roberts',  
    'Turner',  
    'Phillips',  
    'Campbell',  
    'Parker',  
    'Evans',  
    'Edwards',  
    'Collins',  
    'Stewart',  
    'Sanchez',  
    'Morris',  
    'Rogers',  
    'Reed',  
    'Cook',  
    'Morgan',  
    'Bell',  
    'Murphy',  
    'Bailey',  
    'Rivera',  
    'Cooper',  
    'Richardson',  
    'Cox',  
    'Howard',  
    'Ward',  
    'Torres',  
    'Peterson',  
    'Gray',  
    'Ramirez',  
    'James',  
    'Watson',  
    'Brooks',  
    'Kelly',  
    'Sanders',  
    'Price',  
    'Bennett',  
    'Wood',  
    'Barnes',  
    'Ross',  
    'Henderson',  
    'Coleman',  
    'Jenkins',  
    'Perry',  
    'Powell',  
    'Long',  
    'Patterson',  
    'Hughes',  
    'Flores',  
    'Washington',  
    'Butler',  
    'Simmons',  
    'Foster',  
    'Gonzales',  
    'Bryant',   
    'Alexander',  
    'Russell',  
    'Griffin',   
    'Diaz',  
    'Hayes'
}

def generateEmail():
    email = ''.join(random.sample(alphanumericplus,20))
    email += '@'
    email += ''.join(random.sample(alphalower, 10))
    email += ".com"
    return email

def generateName():
    return ''.join(random.sample(firstName, 1)) + ' ' + ''.join(random.sample(lastName, 1))

def generatePassword():
    return ''.join(random.sample(alphanumericplus, 25))

for i in range(0, 20):
    print('INSERT INTO \"member\" VALUES (\"%s\",\"%s\",\"%s\"); ' % (generateEmail(), generateName(), generatePassword()))