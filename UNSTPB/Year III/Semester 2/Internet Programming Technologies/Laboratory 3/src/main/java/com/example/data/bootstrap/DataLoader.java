package com.example.data.bootstrap;

import com.example.data.domain.*;
import com.example.data.repositories.*;
import org.springframework.boot.CommandLineRunner;
import org.springframework.stereotype.Component;
import java.time.LocalDate;

@Component
public class DataLoader implements CommandLineRunner {

    private final PatientRepository patientRepository;
    private final MedicalEncounterRepository medicalEncounterRepository;
    private final HealthIssueRepository healthIssueRepository;
    private final CareProviderRepository careProviderRepository;
    private final HealthServiceRepository healthServiceRepository;

    public DataLoader(PatientRepository patientRepository, MedicalEncounterRepository medicalEncounterRepository, HealthIssueRepository healthIssueRepository,  CareProviderRepository careProviderRepository,  HealthServiceRepository healthServiceRepository) {
        this.patientRepository = patientRepository;
        this.medicalEncounterRepository = medicalEncounterRepository;
        this.healthIssueRepository = healthIssueRepository;
        this.careProviderRepository = careProviderRepository;
        this.healthServiceRepository = healthServiceRepository;
    }

    @Override
    public void run(String... args) throws Exception {
        Patient patient1 = new Patient("Joe Xi Na");
        patientRepository.save(patient1);

        CareProvider careProvider1 = new CareProvider("Baba Yaga", "Orthopedy");
        careProviderRepository.save(careProvider1);

        HealthIssue healthIssue1 = new HealthIssue("Broken Achilles Heel", patient1);
        healthIssueRepository.save(healthIssue1);

        MedicalEncounter encounter1 = new MedicalEncounter(LocalDate.now(), patient1, careProvider1);
        medicalEncounterRepository.save(encounter1);

        HealthService service1 = new HealthService("Physical Exam", "Exam", encounter1);
        healthServiceRepository.save(service1);

        patient1.addHealthIssue(healthIssue1);
        patient1.addMedicalEncounter(encounter1);
        careProvider1.addMedicalEncounter(encounter1);
        encounter1.addHealthService(service1);

        patientRepository.save(patient1);
        careProviderRepository.save(careProvider1);
        medicalEncounterRepository.save(encounter1);
    }
}
