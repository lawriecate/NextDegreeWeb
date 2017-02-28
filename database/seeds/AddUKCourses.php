<?php

use Illuminate\Database\Seeder;
use App\Course;
use App\Institution;
class AddUKCourses extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = array(
"Academic studies in education",
"Academic studies in nursery education",
"Academic studies in primary education",
"Academic studies in specialist education",
"Accountancy",
"Accountancy, finance, business & management studies",
"Acoustics & vibration",
"Acting",
"Adult nursing",
"Aerospace Engineering",
"African studies",
"Agricultural sciences",
"Agriculture",
"Agriculture, horticulture & veterinary sciences",
"American studies",
"Anatomy, physiology & pathology",
"Ancient history",
"Ancient language studies",
"Animal science",
"Animation",
"Anthropology",
"Archaeology",
"Architecture",
"Architecture, building & planning",
"Art & design",
"Artificial intelligence",
"Asian (other) studies",
"Astronomy",
"Audio technologies",
"Australasian studies",
"Banking",
"Bioengineering, biomedical engineering & clinical engineering",
"Biological sciences",
"Biology",
"Biotechnologies",
"Botany",
"British & Irish history",
"Buddhism",
"Building & construction",
"Business studies",
"Celtic studies",
"Chemical, process & energy engineering",
"Chemistry",
"Chinese studies",
"Choreography",
"Christianity",
"Cinematics & photography",
"Cinematography",
"Civil engineering",
"Classical Greek studies",
"Classical studies",
"Clothing/fashion design",
"Communications engineering",
"Comparative literary studies",
"Complementary medicines, therapies & well-being",
"Composition",
"Computational physics",
"Computer generated visual & audio effects",
"Computer science",
"Computing & information technology",
"Counselling",
"Craft skills",
"Crafts",
"Criminology",
"Dance",
"Dance & culture",
"Dance & drama",
"Dental nursing",
"Dentistry",
"Divinity",
"Drama",
"Earth sciences",
"Ecology",
"Economics",
"Education & teaching",
"Electronic & electrical engineering",
"Engineering",
"Engineering & manufacturing",
"English as a second language",
"English language",
"English language & literature",
"English literature",
"English studies",
"Environmental & marine biology",
"Environmental health",
"Environmental sciences",
"European studies",
"Fabric & leather crafts",
"Farming",
"Film & sound recording",
"Finance",
"Fine art",
"Food & drink",
"Food, leisure & hospitality",
"Forensic & archaeological sciences",
"Forestry & arboriculture",
"French studies",
"Gaelic studies",
"Games",
"Genetics",
"Geography & geology",
"Geology",
"German studies",
"Glass crafts",
"Graphic design",
"Health Information Systems",
"Heritage studies",
"Hinduism",
"History",
"History of art",
"Horticulture",
"Hospitality",
"Human geography",
"Human resource management",
"Illustration",
"Imaginative writing",
"Industrial/product design",
"Information management",
"Information systems",
"Interactive & electronic design",
"Interior design",
"International politics",
"Investment & insurance",
"Irish studies",
"Islam",
"Italian studies",
"Japanese studies",
"Journalism",
"Judaism",
"Landscape & garden design",
"Latin studies",
"Law",
"Law by geographic area",
"Law by topic",
"Learning disability nursing",
"Leisure & tourism studies",
"Linguistics",
"Linguistics & classics",
"Livestock",
"Management studies",
"Marine sciences",
"Maritime geography",
"Maritime technologies",
"Marketing",
"Material technologies",
"Mathematics",
"Mathematics & statistics",
"Mechanical engineering",
"Media & creative arts",
"Media Studies",
"Medical physics",
"Medical technology",
"Medicine",
"Medicine, dentistry & optometry",
"Mental health nursing",
"Metal crafts",
"Microbiology",
"Middle Eastern studies",
"Midwifery",
"Minerals technologies",
"Modern European languages & cultural studies",
"Modern history",
"Molecular biology, biophysics & biochemistry",
"Moving image techniques",
"Music",
"Music education/teaching",
"Music studies",
"Music technology & industry",
"Musical performance",
"Musicology",
"Naval architecture",
"Neuroscience",
"Nursery teaching",
"Nursing",
"Nursing, health & wellbeing",
"Nutrition & Dietetics",
"Occupational health & safety",
"Office skills",
"Operational research",
"Optometry",
"Paramedical science",
"Performance & live arts",
"Pharmacology, toxicology & pharmacy",
"Philosophy",
"Philosophy, theology & religion",
"Photography",
"Physical geography",
"Physical Sciences",
"Physics",
"Physiotherapy",
"Planning (urban, rural & regional)",
"Podiatry",
"Politics",
"Portuguese studies",
"Primary teaching",
"Producing & directing motion pictures",
"Production & manufacturing engineering",
"Psychology",
"Publishing",
"Recreation & leisure studies",
"Reed crafts",
"Research & study skills in education",
"Rural estate management",
"Russian & East European studies",
"Scandinavian studies",
"Scottish studies",
"Secondary teaching",
"Social policy",
"Social studies",
"Social work",
"Sociology",
"Software engineering",
"Spanish studies",
"Specialist teaching",
"Speech & language therapy",
"Sport & exercise science",
"Sport sciences",
"Sports coaching",
"Statistics",
"Surface decoration",
"Systems engineering",
"Teacher training",
"Teaching English as a Foreign Language (TEFL)",
"Technologies",
"Theatre studies",
"Theology",
"Topical history",
"Translation studies",
"Types of dance",
"Types of music",
"Veterinary medicine",
"Visual & audio effects",
"Welsh studies",
"Wood crafts",
"World history",
"World languages & cultural studies",
"Zoology"
);
$uon = array("Accountancy",
"Aerospace Engineering",
"Agricultural and Crop Science",
"Agricultural and Livestock Science",
"Agricultural Business Management",
"Agriculture",
"American and Canadian Literature, History and Culture",
"American Studies and English",
"American Studies and History",
"American Studies and Latin American Studies",
"Ancient History",
"Ancient History and Archaeology",
"Ancient History and History",
"Animal Science",
"Archaeology",
"Archaeology and Classical Civilisation",
"Archaeology and Geography",
"Archaeology and History",
"Archaeology and History of Art",
"Architectural Environment Engineering",
"Architecture",
"Architecture and Environmental Design",
"Biblical Studies and Theology",
"Biochemistry",
"Biochemistry and Biological Chemistry",
"Biochemistry and Genetics",
"Biochemistry and Molecular Medicine",
"Biology",
"Biotechnology",
"Chemical Engineering",
"Chemical Engineering with Environmental Engineering",
"Chemistry",
"Chemistry and Molecular Physics",
"Civil Engineering",
"Classical Civilisation",
"Classical Civilisation and Philosophy",
"Classics",
"Classics and English",
"Computer Science",
"Computer Science and Artificial Intelligence",
"Computer Science with Artificial Intelligence",
"Contemporary Chinese Studies with International Relations",
"Criminology and Social Policy",
"Criminology and Sociology",
"Data Science",
"Economics",
"Economics and Econometrics",
"Economics and International Economics",
"Economics and Philosophy",
"Economics with Chinese Studies",
"Economics with French",
"Economics with German",
"Economics with Hispanic Studies",
"Economics with Russian",
"Education",
"Electrical and Electronic Engineering",
"Electrical Engineering",
"Electrical Engineering and Renewable Energy Systems",
"Electronic and Communications Engineering",
"Electronic and Computer Engineering",
"Electronic Engineering",
"English",
"English and French",
"English and German",
"English and Hispanic Studies",
"English and History",
"English and Philosophy",
"English Language and Literature",
"English with Creative Writing",
"Environmental Biology",
"Environmental Engineering",
"Environmental Geoscience",
"Environmental Science",
"Film and Television Studies",
"Film and Television Studies and American Studies",
"Finance, Accounting and Management",
"Financial Mathematics",
"Food Science",
"French and Contemporary Chinese Studies",
"French and History",
"French and International Media Communications Studies",
"French and Philosophy",
"French and Politics",
"French Studies",
"Genetics",
"Geography",
"Geography with Business",
"German",
"German and Contemporary Chinese Studies",
"German and History",
"German and International Media Communications Studies",
"German and Politics",
"Global Issues and Contemporary Chinese Studies",
"Hispanic Studies",
"Hispanic Studies and History",
"Historical Archaeology",
"History",
"History and East European Cultural Studies",
"History and History of Art",
"History and Politics",
"History of Art",
"History of Art and English",
"History with Contemporary Chinese Studies",
"Humanistic Counselling Practice",
"Industrial Economics",
"Industrial Economics with Insurance",
"International Agricultural Science",
"International Environmental Science",
"International Management",
"International Media and Communications Studies",
"International Relations and Global Issues",
"Latin",
"Law",
"Law with French and French Law",
"Law with German and German Law",
"Law with Spanish and Spanish Law",
"Management",
"Management with Chinese Studies",
"Management with French",
"Management with Spanish",
"Manufacturing Engineering",
"Mathematical Physics",
"Mathematics",
"Mathematics and Economics",
"Mathematics and Management",
"Mechanical Engineering",
"Medical Physiology and Therapeutics",
"Medicinal and Biological Chemistry",
"Medicine",
"Microbiology",
"Midwifery (Pre-registration)",
"Modern European Studies",
"Modern Language Studies",
"Modern Languages",
"Modern Languages with Business",
"Modern Languages with Translation",
"Music",
"Music and Philosophy",
"Natural Sciences",
"Neuroscience",
"Nursing (Adult)",
"Nursing (Children)",
"Nursing (Mental Health)",
"Nutrition",
"Nutrition and Dietetics",
"Nutrition and Food Science",
"Pharmaceutical Sciences",
"Pharmacy",
"Pharmacy (with Pre-registration Scheme)",
"Philosophy",
"Philosophy and Theology",
"Philosophy, Politics and Economics",
"Physics",
"Physics and Philosophy",
"Physics with Astronomy",
"Physics with European Language",
"Physics with Medical Physics",
"Physics with Nanoscience",
"Physics with Theoretical Astrophysics",
"Physics with Theoretical Physics",
"Physiotherapy",
"Plant Science",
"Politics and American Studies",
"Politics and Economics",
"Politics and International Relations",
"Portuguese and International Media Communications Studies",
"Product Design and Manufacture",
"Psychology",
"Psychology and Cognitive Neuroscience",
"Psychology and Philosophy",
"Religion, Culture and Ethics",
"Religion, Philosophy and Ethics",
"Russian and Contemporary Chinese Studies",
"Russian and History",
"Russian Studies",
"Senior Status Law Degree",
"Social Work",
"Sociology",
"Sociology and Social Policy",
"Spanish and Contemporary Chinese Studies",
"Spanish and International Media Communications Studies",
"Sport Rehabilitation and Exercise Science",
"Theology and Religious Studies",
"Tropical Sciences",
"Veterinary Medicine and Veterinary Surgery",
"Veterinary Medicine including a Gateway Year",
"Veterinary Medicine including a Preliminary Year",
"Zoology",
);
$ntu = array("Accounting and Finance",
"Animal Biology",
"Animal Science",
"Animation",
"Architectural Technology",
"Architecture",
"Audio and Music Technology",
"Biochemistry",
"Biological Sciences",
"Biomedical Engineering",
"Biomedical Science",
"Broadcast Journalism",
"Building Surveying",
"Business",
"Business Law",
"Business Management 1 year Incompany",
"Business Management 2 years Incompany",
"Business Management and Accounting and Finance",
"Business Management and Economics",
"Business Management and Entrepreneurship",
"Business Management and Human Resources",
"Business Management and Marketing",
"Chemistry",
"Chemistry with Professional Practice and International Study",
"Childhood Studies",
"Civil Engineering",
"Civil Engineering Design and Construction",
"Coaching and Sport Science",
"Communication and Society and English",
"Communication and Society and Film and Television",
"Communication and Society and Global Studies",
"Communication and Society and History",
"Communication and Society and Linguistics",
"Communication and Society and Media",
"Communication and Society and Philosophy",
"Computer Science",
"Computer Science (Games Technology)",
"Computer Science and Mathematics",
"Computer Systems (Forensic and Security)",
"Computer Systems (Networks)",
"Computer Systems Engineering",
"Computing",
"Construction Management",
"Costume Design and Making",
"Criminology",
"Decorative Arts",
"Design for Film and Television",
"Digital Media Technology",
"Early Years and Psychology",
"Early Years and Special and Inclusive Education",
"Economic with International Finance and Banking",
"Economics",
"Economics International Finance and Banking",
"Economics International Trade and Development",
"Economics with Business",
"Economics with International Trade and Development",
"Education Studies",
"Education Studies and Early Years",
"Education Studies and Psychology",
"Education Studies and Special and Inclusive Education",
"Educational Support",
"Electronic Engineering",
"English",
"English and Film and Television",
"English and History",
"English and Linguistics",
"English and Media",
"English and Philosophy",
"English and TESOL",
"Environmental Science",
"Environmental Sciences",
"Equestrian Psychology and Sports Science",
"Equine Sports Science",
"European Studies and History",
"Exercise, Nutrition and Health",
"Fashion Accessory Design",
"Fashion Communication and Promotion",
"Fashion Design",
"Fashion Knitwear Design and Knitted Textiles",
"Fashion Management",
"Fashion Marketing and Branding",
"Film and Television and History",
"Film and Television and Philosophy",
"Film Production Technology",
"Financial Mathematics",
"Fine Art",
"Food Science and Technology",
"Forensic Science",
"French and Communication and Society",
"French and English",
"French and European Studies",
"French and Film and Television",
"French and German",
"French and Global Studies",
"French and History",
"French and International Relations",
"French and Italian",
"French and Linguistics",
"French and Mandarin Chinese",
"French and Media",
"French and Philosophy",
"French and Spanish",
"French and TESOL",
"Furniture and Product Design",
"Games Art",
"Games Technology",
"Geography",
"Geography (Physical)",
"German and English",
"German and European Studies",
"German and Film and Television",
"German and Global Studies",
"German and History",
"German and International Relations",
"German and Italian",
"German and Linguistics",
"German and Mandarin Chinese",
"German and Media",
"German and Philosophy",
"German and Spanish",
"German and TESOL",
"Global Studies and History",
"Global Studies and International Relations",
"Global Studies and Media",
"Global Studies and Philosophy",
"Global Studies and Tesol",
"Graphic Design",
"Health and Social Care",
"History",
"History and International Relations",
"History and Linguistics",
"History and Philosophy",
"History and Politics",
"Horticulture",
"Information and Communications Technology",
"Information Systems",
"Interior Architecture and Design",
"International Business",
"International Law",
"International Relations",
"Italian and English",
"Italian and European Studies",
"Italian and Film and Television",
"Italian and Global Studies",
"Italian and History",
"Italian and International Relations",
"Italian and Linguistics",
"Italian and Mandarin Chinese",
"Italian and Media",
"Italian and Philosophy",
"Italian and TESOL",
"Journalism",
"Law",
"Law DL",
"Law with Business",
"Law with Criminology",
"Law with Psychology",
"Linguistics and Media",
"Linguistics and Philosophy",
"Live and Technical Events",
"Management and Leadership",
"Mandarin Chinese and English",
"Mandarin Chinese and European Studies",
"Mandarin Chinese and Film and Television",
"Mandarin Chinese and Global Studies",
"Mandarin Chinese and International Relations",
"Mandarin Chinese and Linguistics",
"Marketing",
"Mathematics",
"Media",
"Media and Film and Television",
"Media and International Relations",
"Media and Philosophy",
"Microbiology",
"Music Performance",
"Pharmaceutical and Medicinal Chemistry",
"Pharmacology",
"Photography",
"Physics",
"Physics with Astrophysics",
"Physics with Forensic Applications",
"Physics with Nuclear Technology",
"Politics",
"Politics and International Relations",
"Primary Education",
"Product Design",
"Property Development & Planning",
"Property Finance and Investment",
"Psychology",
"Psychology with Criminology",
"Psychology with Sociology",
"Quantity Surveying",
"Quantity Surveying and Construction Commercial Management",
"Real Estate",
"Social Work",
"Sociology",
"Software Engineering",
"Spanish and Communication and Society",
"Spanish and English",
"Spanish and European Studies",
"Spanish and Film and Television",
"Spanish and Global Studies",
"Spanish and History",
"Spanish and International Relations",
"Spanish and Italian",
"Spanish and Linguistics",
"Spanish and Mandarin Chinese",
"Spanish and Media",
"Spanish and Philosophy",
"Spanish and TESOL",
"Sport and Exercise Science",
"Sport Engineering",
"Sport Exercise Science",
"Sport Science and Management",
"Sport Science and Mathematics",
"Television Production Technology",
"Textile Design",
"Theatre Design",
"Veterinary Nursing",
"Visual Effects Production Technology",
"Wildlife Conservation",
"Youth Justice",
"Youth Studies",
"Zoo Biology",
);
        $institution = Institution::where('slug','ntu')->first()->id;
		foreach($ntu as $name) {
			Course::create(['name' => $name,'institution_id'=>$institution]);
		}
        $institution = Institution::where('slug','uon')->first()->id;
        foreach($uon as $name) {
            Course::create(['name' => $name,'institution_id'=>$institution]);
        }
        /*$courses = array_merge($uon,$ntu);
        foreach($courses as $name) {
            Course::create(['name' => $name,'institution_id'=>$institution]);
        }*/
    }
}
