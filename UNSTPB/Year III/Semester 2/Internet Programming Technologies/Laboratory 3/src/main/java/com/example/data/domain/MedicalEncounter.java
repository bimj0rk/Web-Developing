package com.example.data.domain;

import jakarta.persistence.*;
import lombok.Data;
import lombok.NoArgsConstructor;
import java.time.LocalDate;
import java.util.HashSet;
import java.util.Set;

@Entity
@Data
@NoArgsConstructor
public class MedicalEncounter {
    @Id
    @GeneratedValue
    private Long id;
    private LocalDate date;

    @ManyToOne
    private Patient patient;

    @ManyToOne
    private CareProvider careProvider;

    @OneToMany(mappedBy = "medical_encounter", cascade = CascadeType.PERSIST, fetch = FetchType.EAGER)
    private Set<HealthService> healthServices = new HashSet<>();
    public MedicalEncounter(LocalDate date) {
        this.date = date;
    }
}